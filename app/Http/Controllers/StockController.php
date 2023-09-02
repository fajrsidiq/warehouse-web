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


    public function incomingLog()
    {
        $incomingLogs = StockIn::orderByDesc('created_at')->get();
        return view('stock.incoming_log', compact('incomingLogs'));
    }

    public function searchIncoming(Request $request)
    {
        // Validate the input
        $request->validate([
            'date' => 'required|date_format:Y-m-d',
        ]);

        // Get the date from the request
        $searchDate = $request->input('date');

        // Perform the search on incoming logs
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
        // Validate the input
        $request->validate([
            'date' => 'required|date_format:Y-m-d',
        ]);

        // Get the date from the request
        $searchDate = $request->input('date');

        // Perform the search on outgoing logs
        $outgoingLogs = StockOut::whereDate('created_at', $searchDate)->orderByDesc('created_at')->get();

        return view('stock.outgoing_log', compact('outgoingLogs', 'searchDate'));
    }
}
