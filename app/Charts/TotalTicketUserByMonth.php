<?php

namespace App\Charts;

use App\Models\Entrance;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class TotalTicketUserByMonth
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $user = auth()->user();
        $totalTicketsByMonth = Entrance::selectRaw('MONTH(date) as month, COUNT(*) as total')
        ->where('user_id',$user->id)
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
        return $this->chart->barChart()
            ->addData('Tiket', $result->pluck('total')->toArray())
            ->setXAxis( $result->pluck('month_name')->toArray());
    }
}
