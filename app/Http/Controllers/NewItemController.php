<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;

class NewItemController extends Controller
{
    public function create()
    {
        return view('newitem.create');
    }

    public function store(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'item_name' => 'required|unique:stocks',
            'stock_amount' => 'nullable|numeric',
        ]);

        // Create new stock item
        Stock::create($validatedData);

        return redirect()->route('newitem.create')->with('success', 'Item created successfully.');
    }
}

