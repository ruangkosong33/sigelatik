<?php

namespace App\Http\Controllers\Profil;

use App\Models\Thumbnail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ThumbnailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.thumbnail.index-thumbnail');
    }

    public function datas()
    {
        $thumbnail=Thumbnail::orderBy('id')->get();

        return datatables($thumbnail)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                return '
                <button onclick="editForm(`'.route('thumbnail.show', $row->id).'`)"  class="edit btn btn-warning btn-sm ml-1"><i class="fas fa-edit"></i></button>
                <button onclick="deleteData(`'.route('thumbnail.destroy', $row->id).'`)" class="destroy btn btn-danger btn-sm ml-1"><i class="fas fa-trash"></i></button>
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
        $validator=Validator::make($request->all(), [
            'title'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png|max:5000',
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()], 422);
        }

        $file = $request->file('image');

        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $images = time() . '.' . $extension;

            $img = Image::make($file);
            $img->resize(400,173);

            $path = 'public/image-thumbnail/' . $images;
            Storage::put($path, $img->stream()->__toString());
        } else {
            $images = '';
        }

        $thumbnail=Thumbnail::create([
            'title'=>$request->title,
            'image'=>$images,
            'link'=>$request->link,
        ]);

        return response()->json([$thumbnail, 'message'=>'Data Berhasil Di Tambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Thumbnail $thumbnail)
    {
        $imagePath = asset('storage/image-thumbnail/' . $thumbnail->image);

        return response()->json(['data'=>$thumbnail, 'imagePath'=>$imagePath]);
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
    public function update(Request $request, Thumbnail $thumbnail)
    {
        $validator=Validator::make($request->all(), [
            'title'=>'required',
            'image'=>'mimes:jpeg,jpg,png|max:5000',
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()], 422);
        }

        $file = $request->file('image');

        if ($file) {

            if ($thumbnail->image && Storage::exists('public/image-thumbnail/' . $thumbnail->image)) {
                Storage::delete('public/image-thumbnail/' . $thumbnail->image);
            }

            $extension = $file->getClientOriginalExtension();
            $images = time() . '.' . $extension;

            $img = Image::make($file);
            $img->resize(400,173);

            $path = 'public/image-thumbnail/' . $images;
            Storage::put($path, $img->stream()->__toString());
        } else {
            $images=$thumbnail->image;
        }

        $thumbnail->update([
            'title'=>$request->title,
            'image'=>$images,
            'link'=>$request->link,
        ]);

        return response()->json([$thumbnail, 'message'=>'Data Berhasil Di Update']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Thumbnail $thumbnail)
    {
        $thumbnail = Thumbnail::where('id', $thumbnail->id)->first();

        if (!$thumbnail) {
            return response()->json(['message' => 'Thumbnail not found'], 404);
        }

        if ($thumbnail->image && Storage::exists('public/image-thumbnail/' . $thumbnail->image)) {
            Storage::delete('public/image-thumbnail/' . $thumbnail->image);
        }

        $thumbnail->delete();

        return response()->json([$thumbnail, 'message'=>'Data Berhasil Di Hapus']);
    }
}
