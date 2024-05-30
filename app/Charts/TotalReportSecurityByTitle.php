<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Reportsecurity;

class TotalReportSecurityByTitle
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\HorizontalBar
    {
        $reportsecurityData = Reportsecurity::all();

        $data = $reportsecurityData->groupBy('name_opd')->map->count();

        $nameOpds = $data->keys()->toArray();
        $counts = $data->values()->map(function ($count) {
            return intval($count);
        })->toArray();

        $customColors = ['#FFC107', '#D32F2F', '#4CAF50', '#2196F3', '#FF5722', '#795548'];

        return $this->chart->horizontalBarChart()
            ->setTitle('Report Security by Name OPD (Horizontal)')
            ->addData('Reports', $counts)
            ->setLabels($nameOpds)
            ->setColors($customColors);
    }
}
