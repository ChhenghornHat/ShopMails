<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.user.index');
    }

    /**
     * Get user register data
     */
    public function getUsers(Request $request)
    {
        $query = Admin::query()
            ->orderBy('admins.id', 'DESC');

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
            'recordsTotal' => Admin::count(),
            'recordsFiltered' => $users->total(),
            'data' => $users->items(),
        ]);
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
