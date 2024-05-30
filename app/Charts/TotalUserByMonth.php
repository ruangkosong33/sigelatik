<?php

namespace App\Charts;

use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class TotalUserByMonth
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $totalTicketsByMonth = User::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        $allMonths = range(1, 12);

        // Menggabungkan hasil query dengan semua bulan dan menetapkan total 0 untuk bulan yang tidak memiliki tiket
        $result = collect($allMonths)->map(function ($month) use ($totalTicketsByMonth) {
            $matchedMonth = $totalTicketsByMonth->where('month', $month)->first();
            Carbon::setLocale('id');
            $carbonMonth = Carbon::create()->month($month);
            return [
                'month' => $month,
                'total' => $matchedMonth ? $matchedMonth->total : 0,
                'month_name' => $carbonMonth->translatedFormat('F'),
            ];
        });
        return $this->chart->lineChart()
            ->addData('Tiket', $result->pluck('total')->toArray())
            ->setXAxis( $result->pluck('month_name')->toArray());
    }
}
