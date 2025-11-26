<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MailStock;
use Illuminate\Http\Request;

class MailStockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.mail-stock.index');
    }

    /**
     * Get mail stock data
     */
    public function getMailStocks(Request $request)
    {
        $query = MailStock::query();

        // Built-in DataTable search
        if ($request->search['value']) {
            $search = $request->search['value'];

            $query->where(function($q) use ($search) {
                $q->where('mail', 'like', "%{$search}%")
                    ->orWhere('used', 'like', "%{$search}%")
                    ->orWhere('flatform', 'like', "%{$search}%")
                    ->orWhere('smtp', 'like', "%{$search}%");
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
            'recordsTotal' => MailStock::count(),
            'recordsFiltered' => $users->total(),
            'data' => $users->items(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.mail-stock.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $stock = new MailStock();
        $stock->mail = $request->mail;
        $stock->password = $request->password;
        $stock->flatform = $request->flatform;
        $stock->smtp = $request->smtp;
        $stock->save();

        $notification = array(
            'status' => 'success',
            'message' => 'Stock added successfully!'
        );
        return redirect()->route('mail.stock')->with($notification);
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
        $stock = MailStock::find($id);

        return view('backend.mail-stock.edit', compact('stock'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $stock = MailStock::find($id);
        $stock->mail = $request->mail;
        $stock->password = $request->password;
        $stock->flatform = $request->flatform;
        $stock->smtp = $request->smtp;
        $stock->save();

        $notification = array(
            'status' => 'success',
            'message' => 'Stock updated successfully!'
        );
        return redirect()->route('mail.stock')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
