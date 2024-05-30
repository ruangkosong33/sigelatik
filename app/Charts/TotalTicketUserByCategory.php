<?php

namespace App\Charts;

use App\Models\Category;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class TotalTicketUserByCategory
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $user = auth()->user();
        $totalTicketsByCategory = Category::withCount(['entrance'=>function ($query) use($user){
            $query->where('user_id', $user->id);
        }])
            ->get(['title', 'entrance_count']);
        // dd($totalTicketsByCategory);
        return $this->chart->pieChart()
            ->addData($totalTicketsByCategory->pluck('entrance_count')->toArray())
            ->setLabels($totalTicketsByCategory->pluck('title')->toArray());
    }
}
