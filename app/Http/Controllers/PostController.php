<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
// use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = '';
        if (request('category')) {
            $category = PostCategory::firstWhere('slug', request('category'));
            $title = $category->name;
        }


        return view('berita', [
            'title' => 'Berita',
            'subtitle' => 'Kategori: ' . $title,
            'highlights' => Post::take(5)->latest()->get(),
            'posts' => Post::where('active', '=', '1')->latest()->filter(request(['category', 'search']))->paginate(8)->onEachSide(2),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->increment('click', 1);
        return view('read', [
            'title' => $post->title,
            'post' => $post
        ]);
    }
}
