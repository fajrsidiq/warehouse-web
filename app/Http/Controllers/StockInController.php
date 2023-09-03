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
        $entries = $request->input('entries');
        foreach ($entries as $entry) {
            $validatedData = validator($entry, [
                'item_name' => 'required',
                'stock_in_amount' => 'required|numeric',
                'weight' => 'required|numeric',
                'price' => 'required|numeric',
                'notes' => 'nullable|string',
            ])->validate();
            StockIn::create($validatedData);
            $stock = Stock::where('item_name', $entry['item_name'])->first();
            $stock->stock_amount += $entry['stock_in_amount'];
            $stock->weight += $entry['weight'];
            $stock->save();
        }
        return redirect()->route('stock.in')->with('success', 'Stock in recorded successfully.');
    }
}
