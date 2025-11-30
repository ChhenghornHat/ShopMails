<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Jobs\FetchOtpJob;
use App\Models\MailStock;
use App\Models\Order;
use App\Services\CustomOrderService;
use App\Services\GmailOrderService;
use App\Services\OutlookOrderService;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $counts = MailStock::select('smtp')
            ->selectRaw('COUNT(*) as total')
            ->whereIn('smtp', ['Gmail', 'Outlook', 'Custom'])
            ->groupBy('smtp')
            ->pluck('total', 'smtp');

        $gmailCount   = $counts->get('Gmail', 0);
        $outlookCount = $counts->get('Outlook', 0);
        $customCount  = $counts->get('Custom', 0);

        return view('frontend.purchase-email.index', compact('gmailCount', 'outlookCount', 'customCount'));
    }

    public function getOtp($id)
    {
        $order = Order::findOrFail($id);

        //FetchOtpJob::dispatch($order->id, $order->smtp_type);
        FetchOtpJob::dispatch($order->id, 'gmail');

        return back()->with('success', 'OTP fetching started...');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'smtp_type' => 'required|in:gmail,outlook,custom'
        ]);

        $userId = auth()->id();

        $service = match ($request->smtp_type) {
            'gmail'   => app(GmailOrderService::class),
            'outlook' => app(OutlookOrderService::class),
            'custom'  => app(CustomOrderService::class),
        };

        $service->purchase($userId, $request->smtp_type);

        $notification = array(
            'status' => 'success',
            'message' => 'Email purchased successfully!'
        );
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
