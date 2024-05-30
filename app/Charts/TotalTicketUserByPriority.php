<?php

namespace App\Charts;

use App\Models\Priority;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class TotalTicketUserByPriority
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $user = auth()->user();
        $totalTicketsByPriority = Priority::withCount(['entrance'=>function ($query) use($user){
            $query->where('user_id', $user->id);
        }])
            ->get(['title', 'entrance_count']);
        return $this->chart->pieChart()
            ->addData($totalTicketsByPriority->pluck('entrance_count')->toArray())
            ->setLabels($totalTicketsByPriority->pluck('title')->toArray());
    }
}
