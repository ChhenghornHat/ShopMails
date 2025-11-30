<?php
namespace App\Jobs;

use App\Services\CustomOrderService;
use App\Services\GmailOrderService;
use App\Services\OutlookOrderService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Order;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FetchOtpJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $orderId;
    public string $smtpType;

    public function __construct(int $orderId, string $smtpType)
    {
        $this->orderId = $orderId;
        $this->smtpType = $smtpType;
    }

    public function handle()
    {
        $order = Order::find($this->orderId);
        if (!$order) return;

        $service = match ($this->smtpType) {
            'gmail'   => app(GmailOrderService::class),
            'outlook' => app(OutlookOrderService::class),
            'custom'  => app(CustomOrderService::class),
        };

        $otp = $service->fetchOtpForOrder($order);

        if ($otp) {
            $order->otp = $otp;
            $order->status = "delivered";
            $order->save();
        }
    }
}
