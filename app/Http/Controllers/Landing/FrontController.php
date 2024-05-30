<?php

namespace App\Http\Controllers\Landing;

use Carbon\Carbon;
use App\Models\Vpr;
use App\Models\Whm;
use App\Models\Team;
use App\Models\About;
use App\Models\Layanan;
use App\Models\Category;
use App\Models\Entrance;
use App\Models\Intranet;
use App\Models\Software;
use App\Models\Thumbnail;
use Illuminate\Http\Request;
use App\Models\Reportsecurity;
use App\Charts\TotalTicketByMonth;
use App\Charts\TotalTicketByStatus;
use App\Http\Controllers\Controller;
use App\Charts\RatioTicketByCategory;
use App\Charts\TotalTicketByPriority;
use App\Charts\TotalReportSecurityByTitle;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class FrontController extends Controller
{
    public function beranda()
    {
        $about = About::first();

        $layanans=Layanan::orderBy('id')->get();

        $vprs=Vpr::orderBy('id')->get();

        $entrances=Entrance::where('status', 'process')->orderBy('status')->get();

        $intranets=Intranet::orderBy('id')->get()->count();

        $whms=Whm::orderBy('id')->get();

        $softwares=Software::orderBy('id')->get();

        $thumbnails=Thumbnail::orderBy('id')->get();

        $teams=Team::orderBy('id')->get();

        $reportsecurity=Reportsecurity::orderBy('id')->get();

        $chartTicketByCategory = new RatioTicketByCategory(new LarapexChart);
        $chartTicketByPriority = new TotalTicketByPriority(new LarapexChart);
        $chartTicketByStatus = new TotalTicketByStatus(new LarapexChart);
        $chartTicketByMonth = new TotalTicketByMonth(new LarapexChart);
        $chartReportSecurityByTitle = new TotalReportSecurityByTitle(new LarapexChart);

        return view('guest.beranda.index-beranda', [
            'about'=>$about, 'thumbnails'=>$thumbnails, 'layanans'=>$layanans,
            'vprs'=>$vprs, 'entrances'=>$entrances, 'intranets'=>$intranets, 'softwares'=>$softwares, 'teams'=>$teams,
            'chartTicketByCategory'=>$chartTicketByCategory->build(),
            'chartTicketByPriority'=>$chartTicketByPriority->build(),
            'chartTicketByStatus'=>$chartTicketByStatus->build(),
            'chartTicketByMonth'=>$chartTicketByMonth->build(),
            'chartReportSecurityByTitle'=>$chartReportSecurityByTitle->build(),
        ]);
    }
}
