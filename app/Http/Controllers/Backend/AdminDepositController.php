<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDepositController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.deposit.index');
    }

    /**
     * Get user deposit data
     */
    public function getDeposits(Request $request)
    {
        $query = Deposit::query()
            ->join('users', 'users.id', '=', 'deposits.user_id')
            ->select('deposits.*', 'users.name', 'users.email');

        // Built-in DataTable search
        if ($request->search['value']) {
            $search = $request->search['value'];

            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Sorting from DataTable
        if ($request->order) {
            $columnIndex = $request->order[0]['column'];   // which column index
            $columnName  = $request->columns[$columnIndex]['name']; // column name
            $direction   = $request->order[0]['dir'];      // asc / desc

            if ($columnName !== '') {
                $query->orderBy($columnName, $direction);
            }
        }

        // Pagination
        $perPage = $request->length;
        $page = ($request->start / $perPage) + 1;

        $deposits = $query->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'draw' => intval($request->draw),
            'recordsTotal' => Deposit::count(),
            'recordsFiltered' => $deposits->total(),
            'data' => $deposits->items(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::latest()->get();

        return view('backend.deposit.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $deposit = new Deposit();
        $deposit->user_id = $request->user_id;
        $deposit->amount = $request->amount;
        $deposit->type = 'manual';
        $deposit->method = 'ABA KHQR';
        $deposit->save();

        $notification = array(
            'status' => 'success',
            'message' => 'Deposit created successfully!'
        );
        return redirect()->route('deposits')->with($notification);
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
