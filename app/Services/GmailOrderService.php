<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\GmailSmtp;
use App\Models\MailStock;
use App\Models\Order;
use App\Models\Deposit;
use App\Jobs\FetchOtpJob;
use Exception;
use Webklex\PHPIMAP\ClientManager;

class GmailOrderService
{
    public function purchase(int $userId, string $smtpType)
    {
        return DB::transaction(function () use ($userId, $smtpType) {

            // 1) Get SMTP config
            $smtp = GmailSmtp::first();
            if (!$smtp) {
                throw new Exception("Gmail SMTP not configured.");
            }

            $price = (float)$smtp->price;

            // 2) Get available stock
            $stock = MailStock::where('used', 'No')
                ->where('smtp', 'Gmail')
                ->lockForUpdate()
                ->first();

            if (!$stock) {
                throw new Exception("No Gmail email available.");
            }

            // 3) Lock user deposit
            $deposit = Deposit::where('user_id', $userId)->lockForUpdate()->first();
            if (!$deposit || $deposit->amount < $price) {
                throw new Exception("Insufficient balance.");
            }

            // Deduct deposit
            $deposit->decrement('amount', $price);

            // Mark stock used
            $stock->used = 'Yes';
            $stock->save();

            // Create order
            $order = Order::create([
                'user_id'   => $userId,
                'stock_id'  => $stock->id,
                'amount'    => $price,
                'status'    => 'pending'
            ]);

            FetchOtpJob::dispatch($order->id, 'gmail');

            return compact('order', 'stock', 'smtp');
        });
    }


    /**
     * Fetch OTP using dynamic IMAP
     */
    public function fetchOtpForOrder(Order $order)
    {
        $stock = $order->stock;
        $smtp  = GmailSmtp::first();

        $client = (new ClientManager())->make([
            'host' => $smtp->host,
            'port' => $smtp->port,
            'encryption' => $smtp->encryption,
            'validate_cert' => true,
            'username' => $stock->mail,
            'password' => $stock->password,
            'protocol' => 'imap'
        ]);

        $client->connect();

        $folder = $client->getFolder('INBOX');
        $messages = $folder->messages()->since(now()->subMinutes(10))->get();

        foreach ($messages as $message) {
            $body = $message->getHTMLBody() ?: $message->getTextBody();
            if (preg_match('/(\d{6})/', $body, $m)) {
                return $m[1];
            }
        }

        return null;
    }
}
