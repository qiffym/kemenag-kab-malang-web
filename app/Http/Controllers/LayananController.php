<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\LayananCategory;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function layanan()
    {
        $title = '';
        if (request('category')) {
            $category = LayananCategory::firstWhere('slug', request('category'));
            $title = $category->name;
        }
        return view('layanan.layanan', [
            'title' => 'Layanan',
            'subtitle' => $title,
            'layanans' => Layanan::latest()->filter(request(['category']))->get(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function show(Layanan $layanan)
    {
        $layanan->increment('click');
        return view('layanan.read', [
            'title' => $layanan->title,
            'post' => $layanan
        ]);
    }
}
