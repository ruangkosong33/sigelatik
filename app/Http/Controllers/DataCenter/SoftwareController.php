<?php

namespace App\Http\Controllers\DataCenter;

use App\Models\Software;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SoftwareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.software.index-software');
    }

    public function datas(Request $request)
    {
        $software=Software::orderBy('id')->get();

        return datatables($software)
            ->addIndexColumn()
            ->addColumn('action', function($row)
            {
                return '
                <a href="' . route('software.detail', $row->id) . '" class="edit btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                <button onclick="editForm(`'.route('software.show', $row->id).'`)"  class="edit btn btn-warning btn-sm ml-1"><i class="fas fa-edit"></i></button>
                <button onclick="deleteData(`'.route('software.destroy', $row->id).'`)" class="destroy btn btn-danger btn-sm ml-1"><i class="fas fa-trash"></i></button>
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

        $software=Software::create([
            'title'=>$request->title,
            'type'=>$request->type,
            'system'=>$request->system,
            'license'=>$request->license,
            'owner'=>$request->owner,
        ]);

        return response()->json([$software, 'message'=>'Data Berhasil Di Tambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Software $software)
    {
        return response()->json(['data'=>$software]);
    }

    public function detail(Software $software)
    {
        return view('admin.software.show-software', ['software'=>$software]);
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
    public function update(Request $request, Software $software)
    {
        $validator=Validator::make($request->all(),[
            'title'=>'required',
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()], 422);
        }

        $software->update([
            'title'=>$request->title,
            'type'=>$request->type,
            'system'=>$request->system,
            'license'=>$request->license,
            'owner'=>$request->owner,
        ]);

        return response()->json([$software, 'message'=>'Data Berhasil Di Update']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Software $software)
    {
        $software=Software::where('id', $software->id);

        $software->delete();

        return response()->json([$software, 'message'=>'Data Berhasil Di Hapus']);
    }
}
