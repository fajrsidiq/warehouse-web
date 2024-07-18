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
    $stocks = Stock::all();
    
    \Log::info($stocks);
    
    $data = $stocks->pluck('weight')->map(function ($weight) {
        return (float) $weight; 
    })->toArray();
    $labels = $stocks->pluck('item_name')->toArray(); 
    
    \Log::info($data);
    \Log::info($labels);

    return $this->chart->pieChart()
        ->setTitle('Diagram Data Stok')
        ->addData($data)
        ->setLabels($labels);
}
}
