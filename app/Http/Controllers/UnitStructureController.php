<?php

namespace App\Http\Controllers;

use App\Models\UnitStructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UnitStructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.unit.struktur.index', [
            'title' => 'Kelola Struktur Organisasi Unit',
            'posts' => UnitStructure::orderBy('unit_category_id', 'asc')->with('unit_category')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnitStructure  $unitStructure
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.unit.struktur.edit', [
            'title' => 'Edit Struktur Organisasi',
        ])->with('post', UnitStructure::where('id', $id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UnitStructure  $unitStructure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd($request->title);
        $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg,svg|file|max:5120'
        ]);

        $post = UnitStructure::findOrFail($id);

        if (File::exists(\public_path('assets/img/unit/') . $post->image_path)) {
            File::delete(\public_path('assets/img/unit/') . $post->image_path);

            $newImageName =  uniqid() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('assets/img/unit'), $newImageName);

            $post->update([
                'image_path' => $newImageName,
            ]);
        } else {
            $newImageName =  uniqid() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('assets/img/unit'), $newImageName);

            $post->update([
                'image_path' => $newImageName,
            ]);
        }

        return redirect('/admin/unit/struktur')->with('message', "$post->title berhasil perbarui");
    }

    public function active(UnitStructure $unitStructure)
    {
        if (isset($_POST['unshow'])) {
            $unitStructure->update(['status' => 0]);
            return redirect("/admin/unit/struktur")->with('message', 'Gambar sekarang tidak ditampilkan!');
        } elseif (isset($_POST['show'])) {
            $unitStructure->update(['status' => 1]);
            return redirect("/admin/unit/struktur")->with('message', 'Gambar sekarang ditampilkan!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnitStructure  $unitStructure
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnitStructure $unitStructure)
    {
        // 
    }
}
