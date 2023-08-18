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

    public function stockLog()
    {
        $stockIns = StockIn::orderBy('created_at', 'desc')->get();
        $stockOuts = StockOut::orderBy('created_at', 'desc')->get();
        return view('stock.log', compact('stockIns', 'stockOuts'));
    }
}
