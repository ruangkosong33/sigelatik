<?php

namespace App\Http\Controllers\Ticketing;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.index-category');
    }

    public function datas(Request $request)
    {
        $category=Category::orderBy('id')->get();

        return datatables($category)
            ->addIndexColumn()
            ->addColumn('action', function($row)
            {
                return '
                <button onclick="editForm(`'.route('category.show', $row->id).'`)"  class="edit btn btn-warning btn-sm "><i class="fas fa-edit"></i></button>
                <button onclick="deleteData(`'.route('category.destroy', $row->id).'`)" class="destroy btn btn-danger btn-sm ml-1"><i class="fas fa-trash"></i></button>
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

        $category=Category::create([
            'title'=>$request->title,
        ]);

        return response()->json([$category, 'message'=>'Data Berhasil Di Tambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return response()->json(['data'=>$category]);
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
    public function update(Request $request, Category $category)
    {
        $validator=Validator::make($request->all(),[
            'title'=>'required',
        ]);

        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()], 422);
        }

        $category->update([
            'title'=>$request->title,
        ]);

        return response()->json([$category, 'message'=>'Data Berhasil Di Update']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category=Category::where('id', $category->id);

        $category->delete();

        return response()->json([$category, 'message'=>'Data Berhasil Di Hapus']);
    }
}
