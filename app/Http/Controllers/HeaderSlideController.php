<?php

namespace App\Http\Controllers;

use App\Models\HeaderSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FacadesFile;

class HeaderSlideController extends Controller
{
    /**
     * Display a listing of the resource.
     * untuk admin
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.header-slide.index', [
            'title' => 'Kelola Header Slide',
            'slides' => HeaderSlide::latest()->get(),
        ]);
    }

    /**
     * Display a listing of the resource.
     * untuk guest
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.header-slide.create', [
            'title' => 'Tambah Slide Baru',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|mimes:jpg,png,jpeg,svg|file|max:5120',
        ]);

        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();
        $request->image->move(public_path('assets/img/header-slide'), $newImageName);

        HeaderSlide::create([
            'title' => $request->input('title'),
            'image_path' => $newImageName,
        ]);

        return redirect('/admin/header-slide')->with('message', 'Header Slide berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HeaderSlide  $headerSlide
     * @return \Illuminate\Http\Response
     */
    public function show(HeaderSlide $headerSlide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HeaderSlide  $headerSlide
     * @return \Illuminate\Http\Response
     */
    public function edit(HeaderSlide $headerSlide)
    {
        return view('admin.header-slide.edit', [
            'title' => 'Edit Header Slide',
            'post' => $headerSlide
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HeaderSlide  $headerSlide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HeaderSlide $headerSlide)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'nullable|mimes:jpg,png,jpeg,svg|file|max:5120',
        ]);

        if ($request->image == null) {
            $headerSlide->update([
                'title' => $request->input('title'),
            ]);
        } else {
            FacadesFile::delete(\public_path('assets/img/header-slide/') . $headerSlide->image_path);

            $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('assets/img/header-slide'), $newImageName);

            $headerSlide->update([
                'title' => $request->input('title'),
                'image_path' => $newImageName,
            ]);
        }



        return redirect('/admin/header-slide')->with('message', 'Header Slide berhasil diperbarui');
    }

    public function active(HeaderSlide $headerSlide)
    {
        if (isset($_POST['unshow'])) {
            $headerSlide->update(['status' => 0]);
            return redirect("/admin/header-slide")->with('message', 'Slide sekarang tidak ditampilkan!');
        } elseif (isset($_POST['show'])) {
            $headerSlide->update(['status' => 1]);
            return redirect("/admin/header-slide")->with('message', 'Slide sekarang ditampilkan!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HeaderSlide  $headerSlide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $id = $request->id;
        $post = HeaderSlide::findOrFail($id);
        $file = $post->image_path;
        $filename = public_path('assets/img/header-slide/') . $file;
        FacadesFile::delete($filename);


        $post->delete();

        return redirect('/admin/header-slide')->with('message', "Slide berhasil di hapus!");
    }
}
