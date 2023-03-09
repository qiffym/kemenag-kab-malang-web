@extends('layouts.main')
@push('zi-active', 'active bg-success rounded')

@section('main-layout')
<section id="read-content">
  {{ Breadcrumbs::render('ziread', $post) }}
  {{-- Judul --}}
  <div class="row">
    <div class="col-12 pe-5">
      <h2 class="fw-bold fs-1">{{ $post->title }}</h2>
    </div>
    <div class="col-12">

      <div class="d-inline me-2">
        <small>
          <i class="fas fa-bookmark text-muted"></i>
          <a class="text-decoration-none text-success" href="/berita?category={{ $post->zi_category->slug }}">
            <span>{{ $post->zi_category->name }}</span>
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
  <div class="row mt-4">
    <div class="col-12 text-center">
      <img class="bg-dark rounded w-100 img-fluid shadow" src="{{ asset("assets/img/zi/$post->image_path") }}" alt=""
        srcset="">
    </div>
  </div>

  <div class="row mt-4">
    {{-- sharer --}}
    <div class="col-1">
      <div class="social-sharer">
        <a href="#" class="s-facebook">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#" class="s-twitter">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="#" class="s-whatsapp">
          <i class="fab fa-whatsapp"></i>
        </a>
        <a href="#" class="s-linkin">
          <i class="fab fa-linkedin"></i>
        </a>
      </div>
    </div>
    <div class="col ps-3">
      <span class="body-content">
        {!! $post->body !!}
      </span>
    </div>
  </div>
</section>
@endsection