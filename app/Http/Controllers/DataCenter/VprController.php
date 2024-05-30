<?php

namespace App\Http\Controllers\DataCenter;

use App\Models\Vpr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class VprController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.vpr.index-vpr');
    }

    public function datas(Request $request)
    {
        $vpr=Vpr::orderBy('id')->get();

        return datatables($vpr)
            ->addIndexColumn()
            ->editColumn('date', function ($date) {
                return Carbon::parse($date->date)->format('d-m-Y');
            })
            ->addColumn('action', function($row)
            {
                return '
                <a href="' . route('vpr.detail', $row->id) . '" class="edit btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                <button onclick="editForm(`'.route('vpr.show', $row->id).'`)"  class="edit btn btn-warning btn-sm ml-1"><i class="fas fa-edit"></i></button>
                <button onclick="deleteData(`'.route('vpr.destroy', $row->id).'`)" class="destroy btn btn-danger btn-sm ml-1"><i class="fas fa-trash"></i></button>
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
            'title'=>'required',
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()], 422);
        }

        $vpr=Vpr::create([
            'title'=>$request->title,
            'needs'=>$request->needs,
            'date'=>$request->date,
            'ip_public'=>$request->ip_public,
            'ip_local'=>$request->ip_local,
            'storage'=>$request->storage,
            'core'=>$request->core,
            'ram'=>$request->ram,
            'port'=>$request->port,
            'database'=>$request->database,
        ]);

        return response()->json([$vpr, 'message'=>'Data Berhasil Di Tambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vpr $vpr)
    {
        return response()->json(['data'=>$vpr]);
    }

    public function detail(Vpr $vpr)
    {
        return view('admin.vpr.show-vpr', ['vpr'=>$vpr]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vpr $vpr)
    {
        $validator=Validator::make($request->all(),[
            'title'=>'required',
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()], 422);
        }

        $vpr->update([
            'title'=>$request->title,
            'needs'=>$request->needs,
            'date'=>$request->date,
            'ip_public'=>$request->ip_public,
            'ip_local'=>$request->ip_local,
            'storage'=>$request->storage,
            'core'=>$request->core,
            'ram'=>$request->ram,
            'port'=>$request->port,
            'database'=>$request->database,
        ]);

        return response()->json([$vpr, 'message'=>'Data Berhasil Di Update']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vpr $vpr)
    {
        $vpr=Vpr::where('id', $vpr->id);

        $vpr->delete();

        return response()->json([$vpr, 'message'=>'Data Berhasil Di Hapus']);
    }
}
