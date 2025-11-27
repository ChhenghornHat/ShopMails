<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\GmailSmtp;
use Illuminate\Http\Request;

class GmailSmtpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gmailSmtp = GmailSmtp::first();

        return view('backend.email-smtp.index', compact('gmailSmtp'));
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
        $emailSmtp = new GmailSmtp();
        $emailSmtp->host = $request->host;
        $emailSmtp->port = $request->port;
        $emailSmtp->encryption = $request->encryption;
        $emailSmtp->price = $request->price;
        $emailSmtp->save();

        $notification = array(
            'status' => 'success',
            'message' => 'Email SMTP created successfully!'
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
        $emailSmtp = GmailSmtp::find($id);
        $emailSmtp->host = $request->host;
        $emailSmtp->port = $request->port;
        $emailSmtp->encryption = $request->encryption;
        $emailSmtp->price = $request->price;
        $emailSmtp->save();

        $notification = array(
            'status' => 'success',
            'message' => 'Email SMTP updated successfully!'
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
