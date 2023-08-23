<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockIn;
use App\Models\Stock;

class StockInController extends Controller
{
    public function create()
    {
        $items = Stock::all();
        return view('stock.in', compact('items'));
    }

    public function store(Request $request)
{
    // Validate input
    $validatedData = $request->validate([
        'item_name' => 'required',
        'stock_in_amount' => 'required|numeric',
        'weight' => 'required|numeric', 
        'price' => 'required|numeric',
        'notes' => 'nullable|string',
    ]);

    // Store stock in data
    StockIn::create($validatedData);

    // Update stock amount and weight in Stock table
    $stock = Stock::where('item_name', $request->item_name)->first();
    $stock->stock_amount += $request->stock_in_amount;
    $stock->weight += $request->weight;
    $stock->save();

    return redirect()->route('stock.in')->with('success', 'Stock in recorded successfully.');
}

    
}
