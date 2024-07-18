<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use DB;
use App\Charts\StockChart;
use App\Models\Stock;
use App\Models\StockIn;
use App\Models\StockOut;
use App\Models\deleteHistory;

class StockController extends Controller
{
    public function currentStock(StockChart $stockChart)
    {
        $chart = $stockChart->build();
        $stocks = Stock::orderBy('item_name')->get();
        $date = Carbon::now()->subDays(30);

        $mostStockedOut = StockOut::select('item_name', DB::raw('SUM(weight) as total_weight'))
            ->where('created_at', '>=', $date)
            ->groupBy('item_name')
            ->orderByDesc('total_weight')
            ->first();
        
        $mostStockedIn = StockIn::select('item_name', DB::raw('SUM(weight) as total_weight'))
            ->where('created_at', '>=', $date)
            ->groupBy('item_name')
            ->orderByDesc('total_weight')
            ->first();

        $leastStockedOut = StockOut::select('item_name', DB::raw('SUM(weight) as total_weight'))
            ->where('created_at', '>=', $date)
            ->groupBy('item_name')
            ->orderBy('total_weight')
            ->first();

        $leastStockedIn = StockIn::select('item_name', DB::raw('SUM(weight) as total_weight'))
            ->where('created_at', '>=', $date)
            ->groupBy('item_name')
            ->orderBy('total_weight')
            ->first();
        
        return view('stock.current', compact('stocks','chart','mostStockedOut', 'leastStockedOut', 'mostStockedIn', 'leastStockedIn'));
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
            'date' => 'required|regex:/^\d{4}(-\d{2}(-\d{2})?)?$/',
        ]);
    
        $searchDate = $request->input('date');
    
        if (preg_match('/^\d{4}$/', $searchDate)) {
            $incomingLogs = StockIn::whereYear('created_at', $searchDate)
                ->orderByDesc('created_at')
                ->get();
        } elseif (preg_match('/^\d{4}-\d{2}$/', $searchDate)) {
            $incomingLogs = StockIn::whereYear('created_at', substr($searchDate, 0, 4))
                ->whereMonth('created_at', substr($searchDate, 5, 2))
                ->orderByDesc('created_at')
                ->get();
        } elseif (preg_match('/^\d{4}-\d{2}-\d{2}$/', $searchDate)) {
            $incomingLogs = StockIn::whereDate('created_at', $searchDate)
                ->orderByDesc('created_at')
                ->get();
        } else {
            $incomingLogs = collect();
        }
    
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
        'date' => 'required|regex:/^\d{4}(-\d{2}(-\d{2})?)?$/',
    ]);

    $searchDate = $request->input('date');

    if (preg_match('/^\d{4}$/', $searchDate)) {
        $outgoingLogs = StockOut::whereYear('created_at', $searchDate)
            ->orderByDesc('created_at')
            ->get();
    } elseif (preg_match('/^\d{4}-\d{2}$/', $searchDate)) {
        $outgoingLogs = StockOut::whereYear('created_at', substr($searchDate, 0, 4))
            ->whereMonth('created_at', substr($searchDate, 5, 2))
            ->orderByDesc('created_at')
            ->get();
    } elseif (preg_match('/^\d{4}-\d{2}-\d{2}$/', $searchDate)) {
        $outgoingLogs = StockOut::whereDate('created_at', $searchDate)
            ->orderByDesc('created_at')
            ->get();
    } else {
        $outgoingLogs = collect();
    }

    return view('stock.outgoing_log', compact('outgoingLogs', 'searchDate'));
}

    public function deleteIncomingLog(StockIn $log)
    {
        $stock = Stock::where('item_name', $log->item_name)->first();
        
        if (!$stock) {
            return redirect()->route('logs.incoming')->with('error', 'Stock record not found!');
        }

        $originalStockAmount = $stock->stock_amount;
        $originalWeight = $stock->weight;

        $stock->stock_amount -= $log->stock_in_amount;
        $stock->weight -= $log->weight;

        if ($stock->stock_amount < 0 || $stock->weight < 0) {
            return redirect()->route('logs.incoming')->with('error', 'Invalid operation. Stock cannot be negative.');
        }

        $stock->save();

        DeleteHistory::create([
            'item_name' => $log->item_name,
            'stock_in_amount' => $log->stock_in_amount,
            'weight' => $log->weight,
            'price' => $log->price,
            'notes' => $log->notes,
            'type' => 'masuk', 
        ]);

        $log->delete();

        return redirect()->route('logs.incoming')->with('success', 'Incoming log entry deleted successfully and stock updated!');
    }

    
    public function deleteOutgoingLog(StockOut $log)
    {
        $stock = Stock::where('item_name', $log->item_name)->first();
        
        if (!$stock) {
            return redirect()->route('logs.outgoing')->with('error', 'Stock record not found!');
        }

        $originalStockAmount = $stock->stock_amount;
        $originalWeight = $stock->weight;

        $stock->stock_amount += $log->stock_out_amount;
        $stock->weight += $log->weight;

        if ($stock->stock_amount < 0) {
            return redirect()->route('logs.outgoing')->with('error', 'Invalid operation. Stock cannot be negative.');
        }

        $stock->save();

        DeleteHistory::create([
            'item_name' => $log->item_name,
            'stock_in_amount' => $log->stock_out_amount,
            'weight' => $log->weight,
            'price' => $log->price,
            'notes' => $log->notes,
            'type' => 'keluar',
        ]);

        $log->delete();

        return redirect()->route('logs.outgoing')->with('success', 'Outgoing log entry deleted successfully and stock updated!');
    }

    public function deleteHistory()
    {
        $deleteHistory = DeleteHistory::orderByDesc('created_at')->get();
        return view('delete_history.index', compact('deleteHistory'));
    }
    
}
