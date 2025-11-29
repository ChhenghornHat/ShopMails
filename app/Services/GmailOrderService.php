<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\GmailSmtp;
use App\Models\MailStock;
use App\Models\Order;
use App\Models\Deposit;
use App\Jobs\FetchOtpJob;
use Exception;

class GmailOrderService
{
    /**
     * Purchase a single mail from stock for $userId
     * returns array: ['order'=>Order, 'stock'=>MailStock, 'smtp'=>GmailSmtp]
     */
    public function purchase(int $userId)
    {
        return DB::transaction(function () use ($userId) {

            $smtp = GmailSmtp::first();
            if (!$smtp) {
                throw new Exception("SMTP provider not configured.");
            }
            $price = (float)$smtp->price;

            // select one available mail and lock it
            $stock = MailStock::where('used','No')->lockForUpdate()->first();
            if (!$stock) {
                throw new Exception("No email stock available.");
            }

            // lock and check deposit
            $deposit = Deposit::where('user_id', $userId)->lockForUpdate()->first();
            if (!$deposit || $deposit->amount < $price) {
                throw new Exception("Insufficient balance.");
            }

            // deduct deposit
            $deposit->decrement('amount', $price);

            // mark stock used
            $stock->used = 'Yes';
            $stock->save();

            // create order
            $order = Order::create([
                'user_id' => $userId,
                'stock_id' => $stock->id,
                'amount' => $price,
                'status' => 'pending'
            ]);

            // dispatch OTP fetch job (async)
            FetchOtpJob::dispatch($order->id);

            // return data
            return [
                'order' => $order,
                'stock' => $stock,
                'smtp'  => $smtp
            ];
        }, 5); // 5 retries on deadlock
    }

    public function saveOtp(int $orderId, string $otp)
    {
        $order = Order::find($orderId);
        if (!$order) return null;
        $order->otp = $otp;
        $order->status = 'delivered';
        $order->save();
        return $order;
    }

    public function latestForUser(int $userId)
    {
        return Order::with('stock')->where('user_id',$userId)->latest()->first();
    }
}
