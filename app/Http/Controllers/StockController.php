<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\StockIn;
use App\Models\StockOut;

class StockController extends Controller
{
    public function currentStock()
    {
        $stocks = Stock::orderBy('item_name')->get();
        return view('stock.current', compact('stocks'));
    }

    public function edit(Stock $stock)
    {
        return view('stock.edit', compact('stock'));
    }

    public function update(Request $request, Stock $stock)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
        ]);

        $stock->update([
            'item_name' => $request->input('item_name'),
        ]);

        StockIn::where('item_name', $stock->getOriginal('item_name'))
            ->update(['item_name' => $request->input('item_name')]);

        return redirect()->route('stock.current')->with('success', 'Item name updated successfully.');
    }

    public function valuation()
    {
        $stocks = Stock::orderBy('item_name')->get();
        return view('stock.valuation', ['stocks' => $stocks]);
    }

    public function incomingLog()
    {
        $incomingLogs = StockIn::orderByDesc('created_at')->get();
        return view('stock.incoming_log', compact('incomingLogs'));
    }

    public function searchIncoming(Request $request)
    {
        $request->validate([
            'date' => 'required|date_format:Y-m-d',
        ]);

        $searchDate = $request->input('date');

        $incomingLogs = StockIn::whereDate('created_at', $searchDate)->orderByDesc('created_at')->get();

        return view('stock.incoming_log', compact('incomingLogs', 'searchDate'));
    }

    public function outgoingLog()
    {
        $outgoingLogs = StockOut::orderByDesc('created_at')->get();
        return view('stock.outgoing_log', compact('outgoingLogs'));
    }

    public function searchOutgoing(Request $request)
    {
        $request->validate([
            'date' => 'required|date_format:Y-m-d',
        ]);

        $searchDate = $request->input('date');

        $outgoingLogs = StockOut::whereDate('created_at', $searchDate)->orderByDesc('created_at')->get();

        return view('stock.outgoing_log', compact('outgoingLogs', 'searchDate'));
    }
}
