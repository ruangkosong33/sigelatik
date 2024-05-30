<?php

namespace App\Http\Controllers\DataCenter;

use App\Models\Hardware;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class HardwareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.hardware.index-hardware');
    }

    public function datas(Request $request)
    {
        $hardware=Hardware::orderBy('id')->get();

        return datatables($hardware)
            ->addIndexColumn()
            ->addColumn('action', function($row)
            {
                return '
                <a href="' . route('hardware.detail', $row->id) . '" class="edit btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                <button onclick="editForm(`'.route('hardware.show', $row->id).'`)"  class="edit btn btn-warning btn-sm ml-1"><i class="fas fa-edit"></i></button>
                <button onclick="deleteData(`'.route('hardware.destroy', $row->id).'`)" class="destroy btn btn-danger btn-sm ml-1"><i class="fas fa-trash"></i></button>
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

        $hardware=Hardware::create([
            'title'=>$request->title,
            'utilization'=>$request->utilization,
            'manage'=>$request->manage,
            'location'=>$request->location,
            'application'=>$request->application,
            'specific'=>$request->specific,
        ]);

        return response()->json([$hardware, 'message'=>'Data Berhasil Di Tambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Hardware $hardware)
    {
        return response()->json(['data'=>$hardware]);
    }

    public function detail(Hardware $hardware)
    {
        return view('admin.hardware.show-hardware', ['hardware'=>$hardware]);
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
    public function update(Request $request, Hardware $hardware)
    {
        $validator=Validator::make($request->all(),[
            'title'=>'required',
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()], 422);
        }

        $hardware->update([
            'title'=>$request->title,
            'utilization'=>$request->utilization,
            'manage'=>$request->manage,
            'location'=>$request->location,
            'application'=>$request->application,
            'specific'=>$request->specific,
        ]);

        return response()->json([$hardware, 'message'=>'Data Berhasil Di Update']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hardware $hardware)
    {
        $hardware=Hardware::where('id', $hardware->id);

        $hardware->delete();

        return response()->json([$hardware, 'message'=>'Data Berhasil Di Hapus']);
    }
}
