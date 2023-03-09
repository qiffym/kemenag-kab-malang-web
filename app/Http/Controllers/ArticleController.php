<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\File as FacadesFile;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.artikel.index', [
            'title' => 'Profile Kemenag Kab. Malang',
            'articles' => Article::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.artikel.create', [
            'title' => 'Tambah Artikel'
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
            'tanggal' => 'required|date'
        ]);
        $slug = SlugService::createSlug(Article::class, 'slug', $request->title);

        if (is_null($request->image)) {
            Article::create([
                'title' => $request->input('title'),
                'slug' => $slug,
                'body' => $request->input('bodyContent'),
                'publish_at' => $request->input('tanggal')
            ]);
        } else {
            $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('assets/img/instansi'), $newImageName);
            Article::create([
                'title' => $request->input('title'),
                'slug' => $slug,
                'body' => $request->input('bodyContent'),
                'image_path' => $newImageName,
                'publish_at' => $request->input('tanggal')
            ]);
        }

        return redirect('/admin/artikel')->with('message', 'Artikel berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $article->increment('click');
        return view('artikel.read', [
            'title' => $article->title,
            'post' => $article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('admin.artikel.edit', [
            'title' => 'Update Artikel',

        ])->with('post', Article::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|max:255',
            'bodyContent' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg,svg',
            'tanggal' => 'required|date'
        ]);
        $slug = SlugService::createSlug(Article::class, 'slug', $request->title);
        $post = Article::where('slug', $slug);

        if (is_null($request->image)) {
            $post->update([
                'title' => $request->input('title'),
                'slug' => $slug,
                'body' => $request->input('bodyContent'),
                'publish_at' => $request->input('tanggal')
            ]);
        } else {
            $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('assets/img/instansi'), $newImageName);
            $post->update([
                'title' => $request->input('title'),
                'slug' => $slug,
                'body' => $request->input('bodyContent'),
                'image_path' => $newImageName,
                'publish_at' => $request->input('tanggal')
            ]);
        }

        return redirect('/admin/artikel')->with('message', 'Artikel berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $post = Article::findOrFail($id);
        $file = $post->image_path;
        $filename = public_path('assets/img/instansi/') . $file;
        FacadesFile::delete($filename);

        $post->delete();

        return redirect('/admin/artikel')->with('message', "Postingan berhasil di hapus!");
    }
}
