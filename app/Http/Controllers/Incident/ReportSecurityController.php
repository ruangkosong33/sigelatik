<?php

namespace App\Http\Controllers\Incident;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Reportsecurity;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ReportSecurityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.reportsecurity.index-report');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function datas(Request $request)
    {
        $reportsecurity=Reportsecurity::orderBy('id')->get();

        return datatables($reportsecurity)
            ->addIndexColumn()
            ->editColumn('date', function ($date) {
                return Carbon::parse($date->date)->format('d-m-Y');
            })
            ->addColumn('action', function($row)
            {
                return '
                <a href="' . route('report.security.detail', $row->id) . '" class="edit btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                <button onclick="editForm(`'.route('reportsecurity.show', $row->id).'`)"  class="edit btn btn-warning btn-sm ml-1"><i class="fas fa-edit"></i></button>
                <button onclick="deleteData(`'.route('reportsecurity.destroy', $row->id).'`)" class="destroy btn btn-danger btn-sm ml-1"><i class="fas fa-trash"></i></button>
                ';
            })
            ->rawColumns(['action'])
            ->escapeColumns([])
            ->make(true);
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

        $reportsecurity=Reportsecurity::create([
            'name_opd'=>$request->name_opd,
            'title'=>$request->title,
            'date'=>$request->date,
            'body'=>$request->body,
        ]);

        return response()->json([$reportsecurity, 'message'=>'Data Berhasil Di Tambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reportsecurity $reportsecurity)
    {
        return response()->json(['data'=>$reportsecurity]);
    }

    public function detail(Request $request, Reportsecurity $reportsecurity)
    {
        return view('admin.reportsecurity.detail-report', ['reportsecurity'=>$reportsecurity]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reportsecurity $reportsecurity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reportsecurity $reportsecurity)
    {
        $validator=Validator::make($request->all(),[
            'name_opd'=>'required',
            'title'=>'required',
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()], 422);
        }

        $reportsecurity->update([
            'name_opd'=>$request->name_opd,
            'title'=>$request->title,
            'date'=>$request->date,
            'body'=>$request->body,
        ]);

        return response()->json([$reportsecurity, 'message'=>'Data Berhasil Di Update']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reportsecurity $reportsecurity)
    {
        $reportsecurity=Reportsecurity::where('id', $reportsecurity->id);

        $reportsecurity->delete();

        return response()->json([$reportsecurity, 'message'=>'Data Berhasil Di Hapus']);
    }
}
