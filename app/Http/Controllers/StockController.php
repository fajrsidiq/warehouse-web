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
        $stocks = Stock::all();
        return view('stock.current', compact('stocks'));
    }


    public function incomingLog()
    {
        $incomingLogs = StockIn::all();
        return view('stock.incoming_log', compact('incomingLogs'));
    }

    public function outgoingLog()
    {
        $outgoingLogs = StockOut::all();
        return view('stock.outgoing_log', compact('outgoingLogs'));
    }
}
