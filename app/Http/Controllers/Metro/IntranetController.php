<?php

namespace App\Http\Controllers\Metro;

use App\Models\Intranet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class IntranetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.intranet.index-intranet');
    }

    public function datas(Request $request)
    {
        $intranet=Intranet::orderBy('id')->get();

        return datatables($intranet)
            ->addIndexColumn()
            ->addColumn('action', function($row)
            {
                return '
                <a href="' . route('intranet.detail', $row->id) . '" class="edit btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                <button onclick="editForm(`'.route('intranet.show', $row->id).'`)"  class="edit btn btn-warning btn-sm ml-1"><i class="fas fa-edit"></i></button>
                <button onclick="deleteData(`'.route('intranet.destroy', $row->id).'`)" class="destroy btn btn-danger btn-sm ml-1"><i class="fas fa-trash"></i></button>
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

        $intranet=Intranet::create([
            'title'=>$request->title,
            'instance'=>$request->instance,
            'type'=>$request->type,
            'link'=>$request->link,
            'bandwith'=>$request->bandwith,
            'download'=>$request->download,
            'upload'=>$request->upload,
            'manage'=>$request->manage,
        ]);

        return response()->json([$intranet, 'message'=>'Data Berhasil Di Tambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Intranet $intranet)
    {
        return response()->json(['data'=>$intranet]);
    }

    public function detail(Intranet $intranet)
    {
        return view('admin.intranet.show-intranet', ['intranet'=>$intranet]);
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
    public function update(Request $request, Intranet $intranet)
    {
        $validator=Validator::make($request->all(),[
            'title'=>'required',
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()], 422);
        }

        $intranet->update([
            'title'=>$request->title,
            'instance'=>$request->instance,
            'type'=>$request->type,
            'link'=>$request->link,
            'bandwith'=>$request->bandwith,
            'download'=>$request->download,
            'upload'=>$request->upload,
            'manage'=>$request->manage,
        ]);

        return response()->json([$intranet, 'message'=>'Data Berhasil Di Update']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Intranet $intranet)
    {
        $intranet=Intranet::where('id', $intranet->id);

        $intranet->delete();

        return response()->json([$intranet, 'message'=>'Data Berhasil Di Hapus']);
    }
}
