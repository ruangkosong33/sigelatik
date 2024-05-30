<?php

namespace App\Charts;

use App\Models\Entrance;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class TotalTicketUserByStatus
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $user = auth()->user();
        $totalTicketsByStatus = Entrance::groupBy('status')
        ->selectRaw('status, COUNT(*) as total')
        ->where('user_id',$user->id)
        ->get();
        return $this->chart->pieChart()
        ->addData($totalTicketsByStatus->pluck('total')->toArray())
        ->setLabels($totalTicketsByStatus->pluck('status')->toArray());
    }
}
