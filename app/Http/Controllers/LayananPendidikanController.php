<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\LayananCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FacadesFile;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class LayananPendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.layanan.pendidikan.index', [
            'title' => 'Kelola Layanan Pendidikan',
            'posts' => Layanan::where('layanan_category_id', '<=', 7)->filter(request(['category']))->get(),
            'selectedMenu' => LayananCategory::firstWhere('slug', request('category')),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.layanan.pendidikan.create', [
            'title' => 'Tambah Layanan',
            'categories' => LayananCategory::where('id', '<=', 7)->get()
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
            'kategori' => 'required',
            'title' => 'required|max:255',
            'bodyContent' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg,svg',
        ]);

        $slug = SlugService::createSlug(Layanan::class, 'slug', $request->title);

        if (is_null($request->image)) {
            Layanan::create([
                'layanan_category_id' => $request->kategori,
                'title' => $request->input('title'),
                'slug' => $slug,
                'body' => $request->input('bodyContent')
            ]);
        } else {
            $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('assets/img/layanan'), $newImageName);

            Layanan::create([
                'layanan_category_id' => $request->kategori,
                'title' => $request->input('title'),
                'slug' => $slug,
                'body' => $request->input('bodyContent'),
                'image_path' => $newImageName
            ]);
        }
        return redirect('/admin/layanan/pendidikan')->with('message', 'Layanan berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Layanan $pendidikan)
    {
        return view('admin.layanan.pendidikan.edit', [
            'title' => 'Edit Layanan',
            'categories' => LayananCategory::where('id', '<=', 7)->get(),
            'post' => $pendidikan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Layanan $pendidikan)
    {
        $request->validate([
            'kategori' => 'required',
            'title' => 'required|max:255',
            'bodyContent' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg,svg',
        ]);

        $slug = SlugService::createSlug(Layanan::class, 'slug', $request->title);

        if (is_null($request->image)) {
            $pendidikan->update([
                'layanan_category_id' => $request->kategori,
                'title' => $request->input('title'),
                'slug' => $slug,
                'body' => $request->input('bodyContent')
            ]);
        } else {
            FacadesFile::delete(\public_path('assets/img/layanan/') . $pendidikan->image_path);

            $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('assets/img/layanan'), $newImageName);

            $pendidikan->update([
                'layanan_category_id' => $request->kategori,
                'title' => $request->input('title'),
                'slug' => $slug,
                'body' => $request->input('bodyContent'),
                'image_path' => $newImageName
            ]);
        }
        return redirect('/admin/layanan/pendidikan')->with('message', 'Layanan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Layanan  $layanan
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

        return redirect('/admin/layanan/pendidikan')->with('message', "Layanan berhasil di hapus!");
    }
}
