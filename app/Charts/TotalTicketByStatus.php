<?php

namespace App\Charts;

use App\Models\Entrance;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class TotalTicketByStatus
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $totalTicketsByStatus = Entrance::groupBy('status')
        ->selectRaw('status, COUNT(*) as total')
        ->get();
        return $this->chart->pieChart()
        ->addData($totalTicketsByStatus->pluck('total')->toArray())
        ->setLabels($totalTicketsByStatus->pluck('status')->toArray());
    }
}
