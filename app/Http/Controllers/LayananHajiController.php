<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FacadesFile;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class LayananHajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.layanan.haji.index', [
            'title' => 'Kelola Layanan Haji & Umroh',
            'posts' => Layanan::where('layanan_category_id', 8)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.layanan.haji.create', [
            'title' => 'Tambah Layanan'
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
            'bodyContent' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg,svg',
        ]);

        $slug = SlugService::createSlug(Layanan::class, 'slug', $request->title);

        if (is_null($request->image)) {
            Layanan::create([
                'layanan_category_id' => 8,
                'title' => $request->input('title'),
                'slug' => $slug,
                'body' => $request->input('bodyContent')
            ]);
        } else {
            $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('assets/img/layanan'), $newImageName);

            Layanan::create([
                'layanan_category_id' => 8,
                'title' => $request->input('title'),
                'slug' => $slug,
                'body' => $request->input('bodyContent'),
                'image_path' => $newImageName
            ]);
        }
        return redirect('/admin/layanan/haji')->with('message', 'Layanan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Layanan  $haji
     * @return \Illuminate\Http\Response
     */
    public function show(Layanan $haji)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Layanan  $haji
     * @return \Illuminate\Http\Response
     */
    public function edit(Layanan $haji)
    {
        return view('admin.layanan.haji.edit', [
            'title' => 'Edit Layanan',
            'post' => $haji
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Layanan  $haji
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Layanan $haji)
    {
        $request->validate([
            'title' => 'required|max:255',
            'bodyContent' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg,svg',
        ]);

        $slug = SlugService::createSlug(Layanan::class, 'slug', $request->title);

        if (is_null($request->image)) {
            $haji->update([
                'layanan_category_id' => 8,
                'title' => $request->input('title'),
                'slug' => $slug,
                'body' => $request->input('bodyContent')
            ]);
        } else {
            FacadesFile::delete(\public_path('assets/img/layanan/') . $haji->image_path);

            $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('assets/img/layanan'), $newImageName);

            $haji->update([
                'layanan_category_id' => 8,
                'title' => $request->input('title'),
                'slug' => $slug,
                'body' => $request->input('bodyContent'),
                'image_path' => $newImageName
            ]);
        }
        return redirect('/admin/layanan/haji')->with('message', 'Layanan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Layanan  $haji
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $id = $request->id;
        $post = Layanan::findOrFail($id);
        $file = $post->image_path;
        $filename = public_path('assets/img/layanan/') . $file;
        FacadesFile::delete($filename);

        $post->delete();

        return redirect('/admin/layanan/haji')->with('message', "Layanan berhasil di hapus!");
    }
}
