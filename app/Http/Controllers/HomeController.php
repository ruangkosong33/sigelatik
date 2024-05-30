<?php

namespace App\Http\Controllers;

use App\Charts\RatioTicketByCategory;
use App\Charts\TotalTicketByMonth;
use App\Charts\TotalTicketByPriority;
use App\Charts\TotalTicketByStatus;
use App\Charts\TotalTicketUserByCategory;
use App\Charts\TotalTicketUserByMonth;
use App\Charts\TotalTicketUserByPriority;
use App\Charts\TotalTicketUserByStatus;
use App\Charts\TotalUserByMonth;
use App\Charts\TotalUserByVerified;
use App\Events\CommentNotification;
use App\Models\Notification;
use App\Models\Vpr;
use App\Models\Whm;
use App\Models\User;
use App\Models\Category;
use App\Models\Entrance;
use App\Models\Intranet;
use App\Models\Priority;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd('disini');
        $data = [];
        $user = auth()->user();
        // FOR USER ADMIN
        $sumcategory = Category::orderBy('id')->count();
        $sumentrance = Entrance::orderBy('id')->count();
        $sumpriority = Priority::orderBy('id')->count();
        $sumvpr = Vpr::orderBy('id')->count();
        $sumwhm = Whm::orderBy('id')->count();
        $sumintranet = Intranet::orderBy('id')->count();
        $sumuser = User::orderBy('id')->count();

        // FOR USER ADMIN OPD
        $sumentranceByUser = Entrance::where('user_id', $user->id)->count();
        $sumentranceProgress = Entrance::where([['user_id', $user->id], ['status', 'progress']])->count();
        $sumentranceApproved = Entrance::where([['user_id', $user->id], ['status', 'approved']])->count();

        $chartTicketUserByCategory = $user->role == 'admin_opd' ? new TotalTicketUserByCategory(new LarapexChart) : new RatioTicketByCategory(new LarapexChart);
        $chartTicketUserByPriority = $user->role == 'admin_opd' ? new TotalTicketUserByPriority(new LarapexChart) : new TotalTicketByPriority(new LarapexChart);
        $chartTicketUserByStatus = $user->role == 'admin_opd' ? new TotalTicketUserByStatus(new LarapexChart) : new TotalTicketByStatus(new LarapexChart);
        $chartTicketUserByMonth = $user->role == 'admin_opd' ? new TotalTicketUserByMonth(new LarapexChart) : new TotalTicketByMonth(new LarapexChart);
        $chartUserByMonth = new TotalUserByMonth(new LarapexChart);
        $chartUserByVerified = new TotalUserByVerified(new LarapexChart);
        // dd($chartTicketUserByCategory);
        $data = [
            'sumcategory' => $sumcategory,
            'sumentrance' => $sumentrance,
            'sumpriority' => $sumpriority,
            'sumuser' => $sumuser,
            'sumvpr' => $sumvpr,
            'sumwhm' => $sumwhm,
            'sumintranet' => $sumintranet,
            'sumentranceByUser' => $sumentranceByUser,
            'sumentranceProgress' => $sumentranceProgress,
            'sumentranceApproved' => $sumentranceApproved,
            'chartTicketUserByCategory' => $chartTicketUserByCategory->build(),
            'chartTicketUserByPriority' => $chartTicketUserByPriority->build(),
            'chartTicketUserByStatus' => $chartTicketUserByStatus->build(),
            'chartTicketUserByMonth' => $chartTicketUserByMonth->build(),
            'chartUserByMonth' => $chartUserByMonth->build(),
            'chartUserByVerified' => $chartUserByVerified->build(),
        ];

        return view('home', $data);
    }

    public function profile()
    {
        $user = auth()->user();
        return view('admin.profile', compact('user'));
    }

    public function update_profile(Request $request)
    {
        $user = auth()->user();
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'opd_name' => 'required',
            'nip' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        if (isset($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->email = $request->email;
        $user->name = $request->name;


        if ($user->opd()->count() > 0) {
            $opd = $user->opd;
            $opd->name = $request->opd_name;
            $opd->nip = $request->nip;
            $opd->phone = $request->phone;
            $opd->address = $request->address;
            $opd->save();
        } else {
            $opd = $user->opd()->create([
                'name' => $request->opd_name,
                'nip' => $request->nip,
                'phone' => $request->phone,
                'address' => $request->address
            ]);
            $user->opd_id = $opd->id;
        }
        $user->save();

        toastr()->success('Profil berhasil diperbarui.');

        return redirect()->back();
    }

    public function verifiedUser($id)
    {
        $user = User::findOrFail($id);
        $user->verified = 1;
        $user->save();

        toastr()->success('Akun ' . $user->name . ' berhasil diverifikasi.');

        return redirect()->route('home');
    }

    public function comment(Request $request, Entrance $entrance)
    {
        $this->validate($request, [
            'content' => 'required',
        ]);

        $entrance->comments()->create([
            'content' => $request->content,
            'user_id' => auth()->user()->id,
        ]);

        event(new CommentNotification('1 komentar baru'));

        Notification::create([
            'user_id' => auth()->user()->id,
            'type' => 'comment',
            'entrance_id' => $entrance->id,
            'name' => auth()->user()->name,
        ]);

        toastr()->success('Komentar berhasil ditambahkan');

        return redirect()->back();
    }
}
