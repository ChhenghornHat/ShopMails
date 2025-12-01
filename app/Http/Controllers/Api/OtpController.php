<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\OtpTestMail;
use App\Models\Order;
use App\Services\CustomOrderService;
use App\Services\GmailOrderService;
use App\Services\OutlookOrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OtpController extends Controller
{
    public function sendOtpTest()
    {
        try {
            $otp = rand(100000, 999999); // 6-digit OTP

            Mail::to('mrrhorn014@gmail.com')->send(new OtpTestMail($otp));

            return response()->json([
                'success' => true,
                'otp' => $otp
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 400);
        }
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
        $order = Order::where('id', $request->order_id)
            ->where('user_id', $request->user()->id)
            ->firstOrFail();

        $service = match ($order->stock->smtp) {
            'Gmail'   => app(GmailOrderService::class),
            'Outlook' => app(OutlookOrderService::class),
            'Custom'  => app(CustomOrderService::class),
        };

        $otp = $service->fetchOtpForOrder($order);

        return response()->json([
            'success' => true,
            'order' => $order,
            'stock' => $order->stock,
            'otp' => $otp,
        ]);
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
