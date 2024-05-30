<?php

namespace App\Http\Controllers\DataCenter;

use App\Models\Whm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class WhmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.whm.index-whm');
    }

    public function datas(Request $request)
    {
        $whm=Whm::orderBy('id')->get();

        return datatables($whm)
            ->addIndexColumn()
            ->addColumn('action', function($row)
            {
                return '
                <a href="' . route('whm.detail', $row->id) . '" class="edit btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                <button onclick="editForm(`'.route('whm.show', $row->id).'`)"  class="edit btn btn-warning btn-sm ml-1"><i class="fas fa-edit"></i></button>
                <button onclick="deleteData(`'.route('whm.destroy', $row->id).'`)" class="destroy btn btn-danger btn-sm ml-1"><i class="fas fa-trash"></i></button>
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

        $whm=Whm::create([
            'title'=>$request->title,
            'domain'=>$request->domain,
            'ip'=>$request->ip,
            'username'=>$request->username,
        ]);

        return response()->json([$whm, 'message'=>'Data Berhasil Di Tambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Whm $whm)
    {
        return response()->json(['data'=>$whm]);
    }

    public function detail(Whm $whm)
    {
        return view('admin.whm.show-whm', ['whm'=>$whm]);
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
    public function update(Request $request, Whm $whm)
    {
        $validator=Validator::make($request->all(),[
            'title'=>'required',
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()], 422);
        }

        $whm->update([
            'title'=>$request->title,
            'domain'=>$request->domain,
            'ip'=>$request->ip,
            'username'=>$request->username,
        ]);

        return response()->json([$whm, 'message'=>'Data Berhasil Di Update']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Whm $whm)
    {
        $whm=Whm::where('id', $whm->id);

        $whm->delete();

        return response()->json([$whm, 'message'=>'Data Berhasil Di Hapus']);
    }
}
