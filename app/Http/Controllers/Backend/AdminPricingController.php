<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pricing;
use Illuminate\Http\Request;

class AdminPricingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pricing = Pricing::first();

        return view('backend.pricing.index', compact('pricing'));
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
        $pricing = new Pricing;
        $pricing->gmail_price = $request->gmail_price;
        $pricing->outlook_price = $request->outlook_price;
        $pricing->custom_price = $request->custom_price;
        $pricing->save();

        $notification = array(
            'status' => 'success',
            'message' => 'Pricing created successfully!'
        );
        return redirect()->back()->with($notification);
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
        $pricing = Pricing::find($id);
        $pricing->gmail_price = $request->gmail_price;
        $pricing->outlook_price = $request->outlook_price;
        $pricing->custom_price = $request->custom_price;
        $pricing->save();

        $notification = array(
            'status' => 'success',
            'message' => 'Pricing updated successfully!'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
