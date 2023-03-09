<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\File as FacadesFile;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.berita.index', [
            'title' => 'Kelola Berita',
            'posts' => Post::latest()->filter(request(['category', 'search']))->paginate(15),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.berita.create', [
            'title' => 'Tulis Berita',
            'categories' => PostCategory::all()
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
            'image' => 'mimes:jpg,png,jpeg,svg',
            'tanggal' => 'required|date'
        ]);

        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        $buatExcerpt = strip_tags($request->bodyContent);
        $excerpt = Str::limit($buatExcerpt, 107, '...');

        if (is_null(request('image'))) {
            Post::create([
                'user_id' => $request->user_id,
                'post_category_id' => $request->kategori,
                'title' => $request->input('title'),
                'slug' => $slug,
                'excerpt' => ($excerpt),
                'body' => $request->input('bodyContent'),
                'keyword' => $request->input('keyword'),
                'publish_at' => $request->input('tanggal')
            ]);
        } else {
            $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('assets/img/post'), $newImageName);

            Post::create([
                'user_id' => $request->user_id,
                'post_category_id' => $request->kategori,
                'title' => $request->input('title'),
                'slug' => $slug,
                'excerpt' => $excerpt,
                'body' => $request->input('bodyContent'),
                'image_path' => (is_null(request('image')) ? 'logo-kemenag.svg' : "$newImageName"),
                'keyword' => $request->input('keyword'),
                'publish_at' => $request->input('tanggal')
            ]);
        }



        return redirect("/admin/berita")->with('message', 'Postingan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view(
            'admin.berita.edit',
            [
                'title' => 'Update Berita',
                'categories' => PostCategory::all()
            ]
        )->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'kategori' => 'required',
            'title' => 'required|max:255',
            'bodyContent' => 'required',
            'tanggal' => 'required|date'
        ]);
        $buatExcerpt = strip_tags($request->bodyContent);
        $excerpt = Str::limit($buatExcerpt, 107, '...');
        $post = Post::where('slug', $slug);

        if ($request->image == null) {
            $post->update([
                // 'user_id' => $request->user_id,
                'post_category_id' => $request->kategori,
                'title' => $request->input('title'),
                'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
                'excerpt' => $excerpt,
                'body' => $request->input('bodyContent'),
                'publish_at' => $request->input('tanggal')
            ]);
        } else {
            $request->validate([
                'image' => 'mimes:jpg,png,jpeg,svg'
            ]);
            $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('assets/img/post'), $newImageName);

            $post->update([
                // 'user_id' => $request->user_id,
                'post_category_id' => $request->kategori,
                'title' => $request->input('title'),
                'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
                'excerpt' => $excerpt,
                'body' => $request->input('bodyContent'),
                'image_path' => $newImageName,
                'publish_at' => $request->input('tanggal')
            ]);
        }

        return redirect("/admin/berita")->with('message', 'Postingan berhasil diperbarui!');
    }

    public function active(Post $post)
    {
        if (isset($_POST['unshow'])) {
            $post->update(['active' => '0']);
            return redirect("/admin/berita")->with('message', 'Postingan sekarang tidak ditampilkan!');
        } elseif (isset($_POST['show'])) {
            $post->update(['active' => '1']);
            return redirect("/admin/berita")->with('message', 'Postingan sekarang ditampilkan!');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $post = Post::findOrFail($id);
        $file = $post->image_path;
        if ($file != 'logo-kemenag.svg') {
            $filename = public_path('assets/img/post/') . $file;
            FacadesFile::delete($filename);
        }
        $post->delete();

        return redirect('/admin/berita')->with('message', "Postingan berhasil di hapus!");
    }
}
