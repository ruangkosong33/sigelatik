<?php

namespace App\Http\Controllers\Profil;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.team.index-team');
    }

    public function datas(Request $request)
    {
        $team=Team::orderBy('id')->get();

        return datatables($team)
        ->addIndexColumn()
        ->addColumn('action', function($row){
            return '
            <button onclick="editForm(`'.route('team.show', $row->id).'`)"  class="edit btn btn-warning btn-sm ml-1"><i class="fas fa-edit"></i></button>
            <button onclick="deleteData(`'.route('team.destroy', $row->id).'`)" class="destroy btn btn-danger btn-sm ml-1"><i class="fas fa-trash"></i></button>
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'mimes:jpeg,jpg,png|max:5000',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $file = $request->file('image');

        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $images = time() . '.' . $extension;

            $img = Image::make($file);
            $img->resize(600,600);

            $path = 'public/image-team/' . $images;
            Storage::put($path, $img->stream()->__toString());
        } else {
            $images = '';
        }

        $team = Team::create([
            'name'=>$request->name,
            'image'=>$images,
            'jabatan'=>$request->jabatan,
            'testimoni'=>$request->testimoni,
        ]);

        return response()->json(['message' => 'Data Berhasil Disimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        $imagePath = asset('storage/image-team/' . $team->image);

        return response()->json(['data'=>$team, 'imagePath'=>$imagePath]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'mimes:jpeg,jpg,png|max:5000',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $file = $request->file('image');

        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $images = time() . '.' . $extension;

            $img = Image::make($file);
            $img->resize(600,600);

            $path = 'public/image-team/' . $images;
            Storage::put($path, $img->stream()->__toString());
        } else {
            $images = $team->image;
        }

        $team->update([
            'name'=>$request->name,
            'image'=>$images,
            'jabatan'=>$request->jabatan,
            'testimoni'=>$request->testimoni,
        ]);

        return response()->json(['message' => 'Data Berhasil Di Update']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        $team=Team::where('id', $team->id);

        $team->delete();

        return response()->json([$team, 'message'=>'Data Berhasil Di Hapus']);
    }
}
