<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $query = User::query()
            ->leftJoin('deposits as d', function ($join) {
                $join->on('d.user_id', '=', 'users.id');
            })
            ->leftJoin('orders as o', 'o.user_id', '=', 'users.id')
            ->select(
                'users.id',
                'users.name',
                'users.email',
                DB::raw('COALESCE(SUM(o.amount) + d.amount, d.amount) AS total_deposit'),
                DB::raw('COALESCE(SUM(o.amount), 0) AS total_order'),
                DB::raw('COALESCE(d.amount, 0) AS current_balance')
            )
            ->groupBy(
                'users.id',
                'users.name',
                'users.email',
                'd.amount'
            )
            ->orderBy('users.id', 'DESC');

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

        $users = $query->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'draw' => intval($request->draw),
            'recordsTotal' => Deposit::count(),
            'recordsFiltered' => $users->total(),
            'data' => $users->items(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $user = User::find($id);

        return view('backend.deposit.create', compact('user'));
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
        $deposit->notes = $request->notes;
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
