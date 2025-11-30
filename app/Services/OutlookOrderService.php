<?php
namespace App\Services;

use App\Models\CustomSmtp;
use App\Models\OutlookSmtp;
use Illuminate\Support\Facades\DB;
use App\Models\GmailSmtp;
use App\Models\MailStock;
use App\Models\Order;
use App\Models\Deposit;
use App\Jobs\FetchOtpJob;
use Exception;

class OutlookOrderService
{
    public function purchase(int $userId, string $smtpType)
    {
        return DB::transaction(function () use ($userId, $smtpType) {

            // 1) Get provider by type
            $smtp = match ($smtpType) {
                'gmail'   => GmailSmtp::first(),
                'outlook' => OutlookSmtp::first(),
                'custom'  => CustomSmtp::first(),
                default   => null
            };

            if (!$smtp) {
                throw new Exception("SMTP provider ($smtpType) not configured.");
            }

            $price = (float)$smtp->price;

            // 2) Select one available mail
            $stock = MailStock::where('used', 'No')->lockForUpdate()->first();
            if (!$stock) {
                throw new Exception("No email stock available.");
            }

            // 3) Lock user deposit
            $deposit = Deposit::where('user_id', $userId)->lockForUpdate()->first();
            if (!$deposit || $deposit->amount < $price) {
                throw new Exception("Insufficient balance.");
            }

            // 4) Deduct deposit
            $deposit->decrement('amount', $price);

            // 5) Mark stock as used
            $stock->used = 'Yes';
            $stock->save();

            // 6) Create order
            $order = Order::create([
                'user_id' => $userId,
                'stock_id' => $stock->id,
                'amount' => $price,
                'smtp_type' => $smtpType,
                'status' => 'pending'
            ]);

            // 7) Dispatch job
            FetchOtpJob::dispatch($order->id, $smtpType);

            return [
                'order' => $order,
                'stock' => $stock,
                'smtp'  => $smtp
            ];
        }, 5);
    }
}
