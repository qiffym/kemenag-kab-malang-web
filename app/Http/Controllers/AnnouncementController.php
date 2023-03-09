<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\File;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pengumuman.index', [
            'title' => 'Kelola Pengumuman',
            'posts' => Announcement::latest()->paginate(15),
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pengumuman()
    {
        return view('pengumuman.pengumuman', [
            'title' => 'Pengumuman',
            'posts' => Announcement::where('status', true)->latest()->paginate(20),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengumuman.create', [
            'title' => 'Tambah Pengumuman',
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
            'keyword' => 'nullable|max:255',
            'bodyContent' => 'required',
            'image' => 'mimes:jpg,png,jpeg,svg',
            'tanggal' => 'required|date'
        ]);

        $slug = SlugService::createSlug(Announcement::class, 'slug', $request->title);

        if (is_null(request('image'))) {
            Announcement::create([
                'title' => $request->input('title'),
                'slug' => $slug,
                'body' => $request->input('bodyContent'),
                'keyword' => $request->input('keyword'),
                'publish_at' => $request->input('tanggal')
            ]);
        } else {
            $newImageName = uniqid() . '-pengumuman-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('assets/img/post'), $newImageName);

            Announcement::create([
                'title' => $request->input('title'),
                'slug' => $slug,
                'body' => $request->input('bodyContent'),
                'image_path' => $newImageName,
                'keyword' => $request->input('keyword'),
                'publish_at' => $request->input('tanggal')
            ]);
        }



        return redirect("/admin/pengumuman")->with('message', 'Pengumuman berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $pengumuman)
    {
        return view('pengumuman.read', [
            'title' => 'Baca Pengumuman',
            'post' => $pengumuman,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $pengumuman)
    {
        return view('admin.pengumuman.edit', [
            'title' => 'Edit Pengumuman',
            'post' => $pengumuman,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $pengumuman)
    {
        $request->validate([
            'title' => 'required|max:255',
            'keyword' => 'nullable|max:255',
            'bodyContent' => 'required',
            'image' => 'mimes:jpg,png,jpeg,svg',
            'tanggal' => 'required|date'
        ]);

        $slug = SlugService::createSlug(Announcement::class, 'slug', $request->title);

        if (is_null(request('image'))) {
            $pengumuman->update([
                'title' => $request->input('title'),
                'slug' => $slug,
                'body' => $request->input('bodyContent'),
                'keyword' => $request->input('keyword'),
                'publish_at' => $request->input('tanggal')
            ]);
        } else {
            $newImageName = uniqid() . '-pengumuman-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('assets/img/post'), $newImageName);

            $pengumuman->update([
                'title' => $request->input('title'),
                'slug' => $slug,
                'body' => $request->input('bodyContent'),
                'image_path' => $newImageName,
                'keyword' => $request->input('keyword'),
                'publish_at' => $request->input('tanggal')
            ]);
        }

        return redirect("/admin/pengumuman")->with('message', 'Pengumuman berhasil ditambahkan!');
    }

    public function active(Announcement $pengumuman)
    {
        if (isset($_POST['unshow'])) {
            $pengumuman->update(['status' => 0]);
            return redirect("/admin/pengumuman")->with('message', 'Pengumuman sekarang tidak ditampilkan!');
        } elseif (isset($_POST['show'])) {
            $pengumuman->update(['status' => 1]);
            return redirect("/admin/pengumuman")->with('message', 'Pengumuman sekarang ditampilkan!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $pengumuman)
    {
        if (File::exists(\public_path('assets/img/post/') . $pengumuman->image_path)) {
            File::delete(\public_path('assets/img/post/') . $pengumuman->image_path);
            $pengumuman->delete();
        } else {
            $pengumuman->delete();
        }
        return redirect("/admin/pengumuman")->with('message', 'Pengumuman berhasil dihapus!');
    }
}
