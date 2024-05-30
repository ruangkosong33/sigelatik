<?php

namespace App\Charts;

use App\Models\Category;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class RatioTicketByCategory
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $totalTicketsByCategory = Category::withCount('entrance')
            ->get(['title', 'entrance_count']);
        return $this->chart->pieChart()
            ->addData($totalTicketsByCategory->pluck('entrance_count')->toArray())
            ->setLabels($totalTicketsByCategory->pluck('title')->toArray());
    }
}
