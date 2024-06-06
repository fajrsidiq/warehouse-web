<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Stock;

class StockChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
{
    // Fetch your stock data from the database
    $stocks = Stock::all();

    // Log the retrieved data for debugging
    \Log::info($stocks);

    // Prepare data for the chart
    $data = $stocks->pluck('weight')->map(function ($weight) {
        return (float) $weight; // Convert weight to float
    })->toArray(); // Assuming 'weight' is a column representing stock weight
    $labels = $stocks->pluck('item_name')->toArray(); // Assuming 'item_name' is a column representing item names

    // Log the prepared data for debugging
    \Log::info($data);
    \Log::info($labels);

    return $this->chart->pieChart()
        ->setTitle('Data Stok')
        ->addData($data)
        ->setLabels($labels);
}

}
