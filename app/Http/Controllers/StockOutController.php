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
        return view('stock.out', compact('items'));
    }

    public function store(Request $request)
    {
        $entries = $request->input('entries');

        foreach ($entries as $entry) {
            $validatedData = validator($entry, [
                'item_name' => 'required',
                'stock_out_amount' => 'required|numeric',
                'weight' => 'required|numeric',
                'price' => 'required|numeric',
                'notes' => 'nullable|string',
            ])->validate();
    
            StockOut::create($validatedData);
    
            // Update stock amount in Stock table
            $stock = Stock::where('item_name', $entry['item_name'])->first();
            $stock->stock_amount -= $entry['stock_out_amount'];
            $stock->weight -= $entry['weight'];
            $stock->save();
        }

        return redirect()->route('stock.out')->with('success', 'Stock out recorded successfully.');
    }
}

