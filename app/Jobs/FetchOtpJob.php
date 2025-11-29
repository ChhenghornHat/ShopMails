<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;
use Webklex\PHPIMAP\ClientManager;
use Webklex\PHPIMAP\Exceptions\ConnectionFailedException;
use Illuminate\Support\Facades\Log;

class FetchOtpJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $orderId;
    public $tries = 3;

    public function __construct(int $orderId)
    {
        $this->orderId = $orderId;
    }

    public function handle()
    {
        $order = Order::with('stock')->find($this->orderId);
        if (!$order || !$order->stock) return;

        $mail = $order->stock->mail;
        $password = $order->stock->password; // accessor decrypts

        $otp = $this->fetchOtp($mail, $password);

        if ($otp) {
            $order->otp = $otp;
            $order->status = 'delivered';
            $order->save();
            Log::info("OTP found for order {$order->id}: {$otp}");
        } else {
            Log::info("OTP not found for order {$order->id} (will not change status).");
        }
    }

    protected function detectImapHost(string $mail): string
    {
        $domain = strtolower(substr(strrchr($mail, "@"), 1));
        if (str_contains($domain, 'gmail.com')) return 'imap.gmail.com';
        if (str_contains($domain, 'outlook') || str_contains($domain,'hotmail')) return 'outlook.office365.com';
        if (str_contains($domain, 'yahoo')) return 'imap.mail.yahoo.com';
        return 'imap.' . $domain;
    }

    protected function fetchOtp(string $mail, string $password, int $timeout = 15): ?string
    {
        $cm = new ClientManager();

        $host = $this->detectImapHost($mail);

        $client = $cm->make([
            'host'          => $host,
            'port'          => 993,
            'encryption'    => 'ssl',
            'validate_cert' => true,
            'username'      => $mail,
            'password'      => $password,
            'protocol'      => 'imap',
            'options'       => ['connect_timeout' => $timeout]
        ]);

        try {
            $client->connect();
        } catch (ConnectionFailedException $e) {
            Log::warning("IMAP connection failed for {$mail}: " . $e->getMessage());
            return null;
        } catch (\Exception $e) {
            Log::warning("IMAP unknown error for {$mail}: " . $e->getMessage());
            return null;
        }

        try {
            $inbox = $client->getFolder('INBOX');

            // Look for unseen messages in last 15 minutes first
            $messages = $inbox->messages()->unseen()->since(now()->subMinutes(15))->get();

            // fallback to recent messages
            if ($messages->count() === 0) {
                $messages = $inbox->messages()->limit(10)->since(now()->subMinutes(60))->get();
            }

            foreach ($messages as $message) {
                $body = $message->getHTMLBody() ?: $message->getTextBody();
                if (!$body) continue;

                // simple OTP regex: 4-8 digits; adjust to prefer 6-digit if present
                if (preg_match_all('/\b(\d{4,8})\b/', $body, $matches)) {
                    // choose a 6-digit first if available
                    foreach ($matches[1] as $m) {
                        if (strlen($m) === 6) return $m;
                    }
                    // otherwise return the first match
                    return $matches[1][0];
                }
            }
        } catch (\Exception $e) {
            Log::warning("IMAP read error for {$mail}: " . $e->getMessage());
            return null;
        }

        return null;
    }
}
