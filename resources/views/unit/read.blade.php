@extends('layouts.main')

@section('main-layout')
<section id="read-content">
  {{ Breadcrumbs::render('unitread', $post) }}
  {{-- Judul --}}
  <div class="row">
    <div class="col-12 pe-5">
      <h2 class="fw-bold fs-1">{{ $post->title }}</h2>
    </div>
    <div class="col-12">
      <div class="d-inline me-2">
        <small class="text-muted">
          <i class="fas fa-user-circle"></i> <span>{{ $post->author->name }}</span>
        </small>
      </div>
      <div class="d-inline me-2">
        <small>
          <i class="fas fa-bookmark text-muted"></i>
          <a class="text-decoration-none text-success" href="/unit?category={{ $post->unit_category->slug }}">
            <span>{{ $post->unit_category->name }}</span>
          </a>
        </small>
      </div>
      <div class="d-inline me-2">
        <small class="text-muted">
          <i class="fas fa-clock"></i>
          <span>{{ \Carbon\Carbon::parse($post->publish_at)->isoFormat('dddd, D MMMM Y') }}</span>
        </small>
      </div>
    </div>
  </div>

  {{-- Gambar --}}
  <div class="row mt-4">
    <div class="col-12 text-center">
      <img class="bg-dark rounded w-100 img-fluid" src="{{ asset('') }}/assets/img/unit/{{ $post->image_path }}" alt=""
        srcset="">
    </div>
  </div>

  <div class="row mt-4">
    {{-- sharer --}}
    <div class="col-1 d-inline-block text-center ">
      <div class="list-group social-sharer">
        <a href="#" class="s-facebook rounded-circle">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#" class="s-twitter rounded-circle">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="#" class="s-youtube rounded-circle">
          <i class="fab fa-whatsapp    "></i>
        </a>
        <a href="#" class="s-instagram rounded-circle">
          <i class="fab fa-instagram"></i>
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