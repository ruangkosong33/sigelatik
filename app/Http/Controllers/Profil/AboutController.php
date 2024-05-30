<?php

namespace App\Http\Controllers\Profil;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::orderBy('id')->get();

        return view('admin.about.index-about', ['about'=>$about]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about.create-about');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
        ]);

        $about=About::create([
            'title'=>$request->title,
            'body_left'=>$request->body_left,
            'body_right'=>$request->body_right,
        ]);

        flash('Data Berhasil Di Simpan');

        return redirect()->route('about.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('admin.about.edit-about', ['about'=>$about]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        $this->validate($request, [
            'title'=>'required',
        ]);

        $about->update([
            'title'=>$request->title,
            'body_left'=>$request->body_left,
            'body_right'=>$request->body_right,
        ]);

        flash('Data Berhasil Di Update');

        return redirect()->route('about.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        $about=About::where('id', $about->id);

        $about->delete();

        flash('Data Berhasil Di Hapus');

        return redirect()->route('about.index');
    }
}
