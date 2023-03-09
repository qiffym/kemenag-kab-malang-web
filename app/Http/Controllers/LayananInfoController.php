<?php

namespace App\Http\Controllers;

use App\Models\LayananInfo;
use Illuminate\Http\Request;

class LayananInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layanan.info', [
            'title' => 'Info Layanan',
            'online' => LayananInfo::where('category', '1')->get(),
            'offline' => LayananInfo::where('category', '0')->get(),
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
            'link' => 'required|url'
        ]);

        LayananInfo::create([
            'category' => $request->kategori,
            'title' => $request->title,
            'link' => $request->link
        ]);

        return redirect('/layanan/info')->with('message', 'Layanan berhasil ditambahkan');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LayananInfo  $info
     * @return \Illuminate\Http\Response
     */
    public function edit(LayananInfo $info)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LayananInfo  $info
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LayananInfo $info)
    {
        $request->validate([
            'title' => 'required|max:255',
            'link' => 'required|url'
        ]);

        $info->update([
            'title' => $request->title,
            'link' => $request->link
        ]);

        return redirect('/layanan/info')->with('message', 'Layanan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LayananInfo  $info
     * @return \Illuminate\Http\Response
     */
    public function destroy(LayananInfo $info)
    {
        $info->delete();
        return redirect('/layanan/info')->with('message', 'Info layanan berhasil dihapus!');
    }
}
