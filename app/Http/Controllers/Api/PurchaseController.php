<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\CustomOrderService;
use App\Services\GmailOrderService;
use App\Services\OrderService;
use App\Services\OutlookOrderService;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function purchase(Request $request)
    {
        $request->validate([
            'smtp_type' => 'required|in:gmail,outlook,custom'
        ]);

        $userId = $request->user()->id;

        try {
            $data = app(GmailOrderService::class)->purchase($userId, $request->smtp_type);

            return response()->json([
                'success' => true,
                'mail' => $data['stock']->mail,
                'order_id' => $data['order']->id,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function fetchOtp(Request $request)
    {
        $order = Order::where('id', $request->order_id)
            ->where('user_id', $request->user()->id)
            ->firstOrFail();

        $service = match ($order->stock->smtp) {
            'Gmail'   => app(GmailOrderService::class),
            'Outlook' => app(OutlookOrderService::class),
            'Custom'  => app(CustomOrderService::class),
        };

        $otp = $service->fetchOtpForOrder($order);

        if ($otp) {
            $order->otp = $otp;
            $order->status = 'delivered';
            $order->save();
        }

        return response()->json([
            'success' => true,
            'otp' => $order->otp,
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
