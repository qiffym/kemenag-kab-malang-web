<?php

namespace App\Http\Controllers;

use App\Models\HeaderSlide;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'title' => 'Home',
            'posts' => Post::where('active', '=', '1')->latest()->take(6)->get(),
            'slides' => HeaderSlide::where('status', true)->latest()->get(),
        ]);
    }
}
