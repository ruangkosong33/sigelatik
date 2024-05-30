<?php

namespace App\Charts;

use App\Models\Priority;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class TotalTicketByPriority
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $totalTicketsByPriority = Priority::withCount('entrance')
            ->get(['title', 'entrance_count']);
        return $this->chart->pieChart()
            ->addData($totalTicketsByPriority->pluck('entrance_count')->toArray())
            ->setLabels($totalTicketsByPriority->pluck('title')->toArray());
    }
}
