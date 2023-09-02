<?php

namespace App\Http\Controllers;

use App\Models\StockIn;
use App\Models\StockOut;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF; // Corrected import statement

class PDFController extends Controller
{
    public function generateIncomingLogPDF(Request $request)
    {
        $date = $request->input('date');

        // Fetch your incoming stock log data here, filtering by date if provided
        $query = StockIn::orderByDesc('created_at');

        if ($date) {
            $query->whereDate('created_at', $date);
        }

        $incomingLogs = $query->get();

        // Load the view and pass data to it
        $pdf = PDF::loadView('pdf.incoming_log', compact('incomingLogs'));

        // Return the PDF as a response
        return $pdf->download('incoming_log.pdf');
    }

    public function generateOutgoingLogPDF(Request $request)
    {
        $date = $request->input('date');

        // Fetch your incoming stock log data here, filtering by date if provided
        $query = StockOut::orderByDesc('created_at');

        if ($date) {
            $query->whereDate('created_at', $date);
        }

        $outgoingLogs = $query->get();


        // Load the view and pass data to it
        $pdf = PDF::loadView('pdf.outgoing_log', compact('outgoingLogs'));

        // Return the PDF as a response
        return $pdf->download('outgoing_log.pdf');
    }
    // Add methods for other types of PDFs here

    public function generateInInvoice(Request $request)
{
    $data = $request->json()->all();

    $date = $data['date'];
    $entryData = $data['entryData'];
    $total = 0;

    foreach ($entryData as $entry) {
        $total += $entry['weight'] * $entry['price'];
        $entry['price'] = 'rp' . number_format($entry['price'], 2, ',', '.');
    }

    $total = 'rp' . number_format($total, 2, ',', '.');

    $pdf = PDF::loadView('pdf.in_invoice', [
        'date' => $date,
        'entryData' => $entryData,
        'total' => $total
    ]);

    return $pdf->stream('invoice.pdf');
}

public function generateOutInvoice(Request $request)
{
    $data = $request->json()->all();

    $date = $data['date'];
    $entryData = $data['entryData'];
    $total = 0;

    foreach ($entryData as $entry) {
        $total += $entry['weight'] * $entry['price'];
        $entry['price'] = 'rp' . number_format($entry['price'], 2, ',', '.');
    }

    $total = 'rp' . number_format($total, 2, ',', '.');

    $pdf = PDF::loadView('pdf.out_invoice', [
        'date' => $date,
        'entryData' => $entryData,
        'total' => $total
    ]);

    return $pdf->stream('invoice.pdf');
}

}
