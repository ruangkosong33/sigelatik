<?php

namespace App\Http\Controllers\Incident;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Reportnetwork;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ReportNetworkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.reportnetwork.index-report');
    }

    public function datas(Request $request)
    {
        $reportnetwork=Reportnetwork::orderBy('id')->get();

        return datatables($reportnetwork)
            ->addIndexColumn()
            ->editColumn('date', function ($date) {
                return Carbon::parse($date->date)->format('d-m-Y');
            })
            ->addColumn('action', function($row)
            {
                return '
                <a href="' . route('report.network.detail', $row->id) . '" class="edit btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                <button onclick="editForm(`'.route('reportnetwork.show', $row->id).'`)"  class="edit btn btn-warning btn-sm ml-1"><i class="fas fa-edit"></i></button>
                <button onclick="deleteData(`'.route('reportnetwork.destroy', $row->id).'`)" class="destroy btn btn-danger btn-sm ml-1"><i class="fas fa-trash"></i></button>
                ';
            })
            ->rawColumns(['action'])
            ->escapeColumns([])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name_opd'=>'required',
            'title'=>'required',
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()], 422);
        }

        $reportnetwork=Reportnetwork::create([
            'name_opd'=>$request->name_opd,
            'title'=>$request->title,
            'date'=>$request->date,
            'body'=>$request->body,
        ]);

        return response()->json([$reportnetwork, 'message'=>'Data Berhasil Di Tambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reportnetwork $reportnetwork)
    {
        return response()->json(['data'=>$reportnetwork]);
    }

    public function detail(Reportnetwork $reportnetwork)
    {
        return view('admin.reportnetwork.detail-report', ['reportnetwork'=>$reportnetwork]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reportnetwork $reportnetwork)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reportnetwork $reportnetwork)
    {
        $validator=Validator::make($request->all(),[
            'name_opd'=>'required',
            'title'=>'required',
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()], 422);
        }

        $reportnetwork->update([
            'name_opd'=>$request->name_opd,
            'title'=>$request->title,
            'date'=>$request->date,
            'body'=>$request->body,
        ]);

        return response()->json([$reportnetwork, 'message'=>'Data Berhasil Di Update']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reportnetwork $reportnetwork)
    {
        $reportnetwork=Reportnetwork::where('id', $reportnetwork->id);

        $reportnetwork->delete();

        return response()->json([$reportnetwork, 'message'=>'Data Berhasil Di Hapus']);
    }
}
