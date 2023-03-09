<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.layanan.faq.index', [
            'title' => 'Kelola FAQ',
            'posts' => FAQ::all(),
        ]);
    }
    public function home()
    {
        return view('faq', [
            'title' => 'FAQs',
            'faqs' => FAQ::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.layanan.faq.create', [
            'title' => 'Tambah FAQ',
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
            'question' => 'required|max:255',
            'answer' => 'required'
        ]);

        FAQ::create([
            'question' => $request->input('question'),
            'answer' => $request->input('answer')
        ]);

        return redirect('/admin/faq')->with('message', 'FAQ berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function show(FAQ $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function edit(FAQ $faq)
    {

        return view('admin.layanan.faq.edit', [
            'title' => 'Edit FAQ',
            'post' => $faq,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FAQ $faq)
    {
        $validatedData = $request->validate([
            'question' => 'required|max:255',
            'answer' => 'required'
        ]);

        $faq->update($validatedData);

        return redirect('/admin/faq')->with('message', 'FAQ berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function destroy(FAQ $faq)
    {
        $faq->delete();
        return redirect('/admin/faq')->with('message', "Slide berhasil di hapus!");
    }
}
