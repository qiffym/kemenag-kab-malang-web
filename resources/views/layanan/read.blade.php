@extends('layouts.submain')
@section('submain-layout')
<section id="read-content" class="py-3 px-5 rounded" style="background-color: #fff">
  <div class="row">
    {{ Breadcrumbs::render('layananread', $post) }}
    {{-- Judul --}}
    <div class="row">
      <div class="col-sm-12 col-md-10 pe-5">
        <h2 class="fw-bold fs-1">Standar Layanan {{ $post->title }}</h2>
      </div>
      <div class="col-12">
        <div class="d-inline me-2">
          <small>
            <i class="fas fa-bookmark text-muted"></i>
            <a class="text-decoration-none text-success" href="/layanan?category={{ $post->layanan_category->slug }}">
              <span>{{ $post->layanan_category->name }}</span>
            </a>
          </small>
        </div>
        <div class="d-inline me-2">
          <small class="text-muted">
            <i class="fas fa-clock"></i>
            <span>{{ $post->created_at->isoFormat('dddd, D MMMM Y') }}</span>
          </small>
        </div>
      </div>
    </div>
    {{-- Gambar --}}
    <div class="row">
      <div class="col-sm-12 col-md-10 text-center">
        <img class="bg-dark rounded w-100 img-fluid" src="{{ asset('') }}/assets/img/layanan/{{ $post->image_path }}"
          alt="" srcset="">
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-sm-12 col-md-10">
        <div class="card text-dark bg-light mb-3">
          <div class="card-header">
            <h3><i class="fas fa-file-archive"></i> Dokumen Persyaratan</h3>
          </div>
          <div class="card-body">
            <span class="card-text body-content">
              {!! $post->body !!}
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection