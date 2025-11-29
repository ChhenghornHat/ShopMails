<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\GmailOrderService;
use Illuminate\Http\Request;

class GmailOrderController extends Controller
{
    protected $service;

    public function __construct(GmailOrderService $service)
    {
        $this->service = $service;
    }

    public function purchase(Request $request)
    {
        $user = $request->user();
        try {
            $data = $this->service->purchase($user->id);
            return response()->json([
                'success' => true,
                'order_id' => $data['order']->id,
                'email' => $data['stock']->mail,
                'smtp'  => $data['smtp']->host
            ]);
        } catch (\Exception $e) {
            return response()->json(['success'=>false,'message'=>$e->getMessage()], 400);
        }
    }

    public function latest(Request $request)
    {
        $order = $this->service->latestForUser($request->user()->id);
        return response()->json($order);
    }

    // optional: manual save OTP endpoint
    public function saveOtp(Request $request)
    {
        $request->validate(['order_id'=>'required|integer','otp'=>'required']);
        $order = $this->service->saveOtp($request->order_id, $request->otp);
        return response()->json(['success'=>true,'order'=>$order]);
    }
}
