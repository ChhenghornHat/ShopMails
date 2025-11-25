<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticatedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::guard('admin')->attempt($data)) {
            $notification = array(
                'status' => 'success',
                'message' => 'You are logged in successfully'
            );

            return redirect()->route('admin.dashboard')->with($notification);
        } else {
            $notification = array(
                'status' => 'error',
                'message' => 'Invalid email or password'
            );

            return redirect()->route('admin.login')->with($notification);
        }
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
    public function destroy()
    {
        Auth::guard('admin')->logout();

        $notification = array(
            'status' => 'success',
            'message' => 'You are logged out successfully'
        );

        return redirect()->route('admin.login')->with($notification);
    }
}
