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


    public function incomingLog(Request $request)
    {
        $sort = $request->input('sort', 'latest'); // Default to 'latest'

        $query = StockIn::select('*');

        if ($sort === 'latest') {
            $query->orderByDesc('created_at');
        } else {
            $query->orderBy('item_name')->orderByDesc('created_at');
        }

        $incomingLogs = $query->get();
        return view('stock.incoming_log', compact('incomingLogs', 'sort'));
    }

    public function outgoingLog(Request $request)
    {
        $sort = $request->input('sort', 'latest'); // Default to 'latest'

        $query = StockOut::select('*');

        if ($sort === 'latest') {
            $query->orderByDesc('created_at');
        } else {
            $query->orderBy('item_name')->orderByDesc('created_at');
        }

        $outgoingLogs = $query->get();
        return view('stock.outgoing_log', compact('outgoingLogs', 'sort'));
    }
}
