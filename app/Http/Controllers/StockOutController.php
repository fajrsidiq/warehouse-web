<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockOut;
use App\Models\Stock;

class StockOutController extends Controller
{
    public function create()
    {
        $items = Stock::all();
        return view('stockout.create', compact('items'));
    }

    public function store(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'item_name' => 'required',
            'stock_out_amount' => 'required|numeric',
            'price' => 'required|numeric',
            'notes' => 'nullable|string',
        ]);

        // Store stock out data
        StockOut::create($validatedData);

        // Update stock amount in Stock table
        $stock = Stock::where('item_name', $request->item_name)->first();
        $stock->stock_amount -= $request->stock_out_amount;
        $stock->save();

        return redirect()->route('stockout.create')->with('success', 'Stock out recorded successfully.');
    }
}

