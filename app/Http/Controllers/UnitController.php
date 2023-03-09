<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\UnitCategory;
use App\Models\UnitStructure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\File as FacadesFile;


class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     * for admin
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = '';
        if (Auth::user()->role_id == 1) {
            $posts = Unit::latest()->paginate(12);
        } else {
            $posts = Unit::where('user_id', Auth::user()->id)->latest()->paginate(12);
        }

        // untuk admin
        return view('admin.unit.index', [
            'title' => 'Satker Page',
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.unit.create', [
            'title' => 'Tulis Berita',
            'categories' => UnitCategory::all()
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
            'keyword' => 'nullable|max:255',
            'bodyContent' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg,svg',
            'tanggal' => 'required|date'
        ]);

        $slug = SlugService::createSlug(Unit::class, 'slug', $request->title);
        $excerpt = Str::limit($request->bodyContent, 125, '...');

        if (is_null(request('image'))) {
            Unit::create([
                'user_id' => $request->user_id,
                'unit_category_id' => $request->kategori,
                'title' => $request->input('title'),
                'slug' => $slug,
                'excerpt' => strip_tags($excerpt),
                'body' => $request->input('bodyContent'),
                'keyword' => $request->input('keyword'),
                'publish_at' => $request->input('tanggal')
            ]);
        } else {
            $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('assets/img/unit'), $newImageName);

            Unit::create([
                'user_id' => $request->user_id,
                'unit_category_id' => $request->kategori,
                'title' => $request->input('title'),
                'slug' => $slug,
                'excerpt' => strip_tags($excerpt),
                'body' => $request->input('bodyContent'),
                'keyword' => $request->input('keyword'),
                'image_path' => (is_null(request('image')) ? 'logo-kemenag.svg' : "$newImageName"),
                'publish_at' => $request->input('tanggal')
            ]);
        }


        return redirect("/admin/unit")->with('message', 'Postingan berhasil ditambahkan!');
    }

    /**
     * Display a listing of the resource.
     * for user
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function unit()
    {
        $title = '';
        if (request('category')) {
            $category = UnitCategory::firstWhere('slug', request('category'));
            $title = $category->name;
        }
        return view('unit.unit', [
            'title' => 'Unit Kerja',
            'subtitle' => $title,
            'units' => Unit::latest()->filter(request(['category', 'search']))->paginate(9)->onEachSide(2),
            'structures' => UnitStructure::all('image_path'),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        $unit->increment('click');
        return view('unit.read', [
            'title' => $unit->title,
            'post' => $unit
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('admin.unit.edit', [
            'title' => 'Update Berita',
            'categories' => UnitCategory::all()
        ])->with('post', Unit::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'kategori' => 'required',
            'title' => 'required|max:255',
            'bodyContent' => 'required',
            'tanggal' => 'required|date',
            'image' => 'nullable|'
        ]);
        $excerpt = Str::limit($request->bodyContent, 125, '...');

        if (is_null($request->image)) {
            Unit::where('slug', $slug)
                ->update([
                    'user_id' => $request->user_id,
                    'unit_category_id' => $request->kategori,
                    'title' => $request->input('title'),
                    'slug' => $slug,
                    'excerpt' => strip_tags($excerpt),
                    'body' => $request->input('bodyContent'),
                    'keyword' => $request->input('keyword'),
                    'publish_at' => $request->input('tanggal')
                ]);
        } else {
            $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('assets/img/unit'), $newImageName);

            Unit::where('slug', $slug)
                ->update([
                    'user_id' => $request->user_id,
                    'unit_category_id' => $request->kategori,
                    'title' => $request->input('title'),
                    'slug' => $slug,
                    'excerpt' => strip_tags($excerpt),
                    'body' => $request->input('bodyContent'),
                    'keyword' => $request->input('keyword'),
                    'image_path' => $newImageName,
                    'publish_at' => $request->input('tanggal')
                ]);
        }

        return redirect('/admin/unit')->with('message', 'Postingan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $id = $request->id;
        $post = Unit::findOrFail($id);
        $file = $post->image_path;
        if ($file != 'logo-kemenag.svg') {
            $filename = public_path('assets/img/unit/') . $file;
            FacadesFile::delete($filename);
        }

        $post->delete();

        return redirect('/admin/unit')->with('message', "Postingan berhasil di hapus!");
    }
}
