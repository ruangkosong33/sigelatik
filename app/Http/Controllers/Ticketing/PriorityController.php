<?php

namespace App\Http\Controllers\Ticketing;

use App\Models\Priority;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.priority.index-priority');
    }

    public function datas()
    {
        $priority=Priority::orderBy('id')->get();

        return datatables($priority)
            ->addIndexColumn()
            ->addColumn('action', function($row)
            {
                return '
                <button onclick="editForm(`'.route('priority.show', $row->id).'`)"  class="edit btn btn-warning btn-sm "><i class="fas fa-edit"></i></button>
                <button onclick="deleteData(`'.route('priority.destroy', $row->id).'`)" class="destroy btn btn-danger btn-sm ml-1"><i class="fas fa-trash"></i></button>
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

        $priority=Priority::create([
            'title'=>$request->title,
        ]);

        return response()->json([$priority, 'message'=>'Data Berhasil Di Tambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Priority $priority)
    {
        return response()->json(['data'=>$priority]);
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
    public function update(Request $request, Priority $priority)
    {
        $validator=Validator::make($request->all(),[
            'title'=>'required',
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()], 422);
        }

        $priority->update([
            'title'=>$request->title,
        ]);

        return response()->json([$priority, 'message'=>'Data Berhasil Di Tambahkan']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Priority $priority)
    {
        $priority=priority::where('id', $priority->id);

        $priority->delete();

        return response()->json([$priority, 'message'=>'Data Berhasil Di Hapus']);
    }
}
