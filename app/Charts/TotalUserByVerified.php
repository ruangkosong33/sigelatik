<?php

namespace App\Charts;

use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class TotalUserByVerified
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $totalTicketsByStatus = User::groupBy('verified')
        ->selectRaw('verified, COUNT(*) as total')
        ->orderBy('verified')
        ->get();
        return $this->chart->pieChart()
        ->addData($totalTicketsByStatus->pluck('total')->toArray())
        ->setLabels(['Terverifikasi','Belum']);
    }
}
