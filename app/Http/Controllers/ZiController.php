<?php

namespace App\Http\Controllers;

use App\Models\Zi;
use App\Models\ZiCategory;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\File;

class ZiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.zi.index', [
            'title' => 'Kelola Zona Integritas',
            'posts' => Zi::orderBy('zi_category_id')->get(),
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function zi()
    {
        $subtitle = '';
        if (request('category')) {
            $category = ZiCategory::firstWhere('slug', request('category'));
            $subtitle = $category->name;
        }
        return view('zi.zi', [
            'title' => 'Zona Integritas',
            'subtitle' => $subtitle,
            'posts' => Zi::where('status', true)->filter(request(['category']))->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.zi.create', [
            'title' => 'Tambah Postingan ZI',
            'categories' => ZiCategory::all('id', 'name')
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
            'image' => 'mimes:jpg,png,jpeg,svg',
        ]);

        $slug = SlugService::createSlug(Zi::class, 'slug', $request->title);

        if (is_null(request('image'))) {
            Zi::create([
                'zi_category_id' => $request->kategori,
                'title' => $request->input('title'),
                'slug' => $slug,
                'body' => $request->input('bodyContent'),
                'keyword' => $request->input('keyword'),
            ]);
        } else {
            $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('assets/img/Zi'), $newImageName);

            Zi::create([
                'zi_category_id' => $request->kategori,
                'title' => $request->input('title'),
                'slug' => $slug,
                'body' => $request->input('bodyContent'),
                'image_path' => (is_null(request('image')) ? 'logo-kemenag.svg' : "$newImageName"),
                'keyword' => $request->input('keyword'),
            ]);
        }
        return redirect("/admin/zi")->with('message', 'Berita ZI berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Zi  $zi
     * @return \Illuminate\Http\Response
     */
    public function show(Zi $zi)
    {
        return view('zi.read', [
            'title' => 'Baca Berita Zona Integrasi',
            'post' => $zi,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Zi  $zi
     * @return \Illuminate\Http\Response
     */
    public function edit(Zi $zi)
    {
        return view('admin.zi.edit', [
            'title' => 'Edit Berita ZI',
            'post' => $zi,
            'categories' => ZiCategory::all('id', 'name')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Zi  $zi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zi $zi)
    {
        $request->validate([
            'kategori' => 'required',
            'title' => 'required|max:255',
            'bodyContent' => 'required',
            'image' => 'mimes:jpg,png,jpeg,svg',
        ]);

        $slug = SlugService::createSlug(Zi::class, 'slug', $request->title);

        if (is_null(request('image'))) {
            $zi->update([
                'Zi_category_id' => $request->kategori,
                'title' => $request->input('title'),
                'slug' => $slug,
                'body' => $request->input('bodyContent'),
                'keyword' => $request->input('keyword'),
            ]);
        } else {
            $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('assets/img/Zi'), $newImageName);

            $zi->update([
                'Zi_category_id' => $request->kategori,
                'title' => $request->input('title'),
                'slug' => $slug,
                'body' => $request->input('bodyContent'),
                'image_path' => (is_null(request('image')) ? 'logo-kemenag.svg' : "$newImageName"),
                'keyword' => $request->input('keyword'),
            ]);
        }
        return redirect("/admin/zi")->with('message', 'Berita ZI berhasil ditambahkan!');
    }

    public function active(Zi $zi)
    {
        if (isset($_POST['unshow'])) {
            $zi->update(['status' => 0]);
            return redirect("/admin/zi")->with('message', 'berita zi sekarang tidak ditampilkan!');
        } elseif (isset($_POST['show'])) {
            $zi->update(['status' => 1]);
            return redirect("/admin/zi")->with('message', 'berita zi sekarang ditampilkan!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Zi  $zi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zi $zi)
    {
        if (File::exists(\public_path('assets/img/zi/') . $zi->image_path)) {
            File::delete(\public_path('assets/img/zi/') . $zi->image_path);
            $zi->delete();
        } else {
            $zi->delete();
        }
        return redirect("/admin/zi")->with('message', 'berita zi berhasil dihapus!');
    }
}
