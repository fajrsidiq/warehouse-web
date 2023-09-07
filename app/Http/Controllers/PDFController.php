<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\StockIn;
use App\Models\StockOut;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class PDFController extends Controller
{

    public function generateCurrentStock()
    {
        $stocks = Stock::orderBy('item_name')->get();

        $pdf = PDF::loadView('pdf.current_stock', compact('stocks'));

        return $pdf->stream('current_stock.pdf');
    }
    public function generateIncomingLogPDF(Request $request)
    {
        $date = $request->input('date');

        $query = StockIn::orderByDesc('created_at');

        if ($date) {
            $query->whereDate('created_at', $date);
        }

        $incomingLogs = $query->get();

        $pdf = PDF::loadView('pdf.incoming_log', compact('incomingLogs'));

        return $pdf->download('incoming_log.pdf');
    }

    public function generateOutgoingLogPDF(Request $request)
    {
        $date = $request->input('date');
        $query = StockOut::orderByDesc('created_at');

        if ($date) {
            $query->whereDate('created_at', $date);
        }

        $outgoingLogs = $query->get();

        $pdf = PDF::loadView('pdf.outgoing_log', compact('outgoingLogs'));

        return $pdf->download('outgoing_log.pdf');
    }

    public function generateInInvoice(Request $request)
    {
        $data = $request->json()->all();

        $date = $data['date'];
        $entryData = $data['entryData'];
        $total = 0;
        $totalweight = 0;


        foreach ($entryData as $entry) {
            $total += $entry['weight'] * $entry['price'];
            $entry['price'] = 'Rp ' . number_format($entry['price'], 2, ',', '.');
            $totalweight += $entry['weight'];
        }

        $total = 'Rp ' . number_format($total, 2, ',', '.');

        $pdf = PDF::loadView('pdf.in_invoice', [
            'date' => $date,
            'entryData' => $entryData,
            'total' => $total,
            'totalweight' =>  $totalweight
        ]);

        return $pdf->stream('invoice.pdf');
    }

    public function generateOutInvoice(Request $request)
    {
        $data = $request->json()->all();

        $date = $data['date'];
        $entryData = $data['entryData'];
        $total = 0;
        $totalweight = 0;

        foreach ($entryData as $entry) {
            $total += $entry['weight'] * $entry['price'];
            $entry['price'] = 'Rp ' . number_format($entry['price'], 2, ',', '.');
            $totalweight += $entry['weight'];
        }

        $total = 'Rp ' . number_format($total, 2, ',', '.');

        $pdf = PDF::loadView('pdf.out_invoice', [
            'date' => $date,
            'entryData' => $entryData,
            'total' => $total,
            'totalweight' =>  $totalweight
        ]);

        return $pdf->stream('invoice.pdf');
    }
}
