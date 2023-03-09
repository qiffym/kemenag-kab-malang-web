@extends('layouts.main')
@push('zi-active', 'active bg-success rounded')
@section('main-layout')
{{ Breadcrumbs::render('zi') }}
<div class="row mb-2 justify-content-between">
  <div class="col-6 pt-3">
    <h3 class="fw-bold fs-2">ZONA INTEGRITAS</h3>
    @if (request('category'))
    <h4>{{ $subtitle }}</h4>
    @endif
  </div>
  {{-- <div class="col-5 pt-3">
    <form action="/zi" method="get">
      @if (request('category'))
      <input type="hidden" name="category" value="{{ request('category') }}">
  @endif
  <div class="input-group mb-3">
    <input type="text" name="search" class="form-control" placeholder="Cari..." aria-label="Search"
      aria-describedby="button-addon2" value="{{ request('search') }}">
    <button class="btn btn-outline-success" type="submit" id="button-addon2">
      <i class="fa fa-search"></i>
    </button>
  </div>
  </form>
</div> --}}
</div>
<hr class="dropdown-divider">
@if ($posts->count())
<section id="list-zi">
  <div class="row">
    @foreach ($posts as $post)
    <div class="col-12 mb-4">
      <div class="card mb-4">
        <div class="row g-0 align-items-center">
          <div class="col-md-4">
            <img src="{{ asset('') }}/assets/img/zi/{{ $post->image_path }}"
              class="card-img-top img-fluid img-thumbnail bg-dark rounded p-0" alt="image">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title fw-bold"><a class="text-decoration-none text-dark"
                  href="/read/{{ $post->slug }}">{{ $post->title }}</a></h5>
              <div class="mb-2">
                <span class="category">
                  <small><i class="fas fa-bookmark fa-xs text-muted"></i>
                    <a class="text-decoration-none text-success"
                      href="/zi?category={{ $post->zi_category->slug }}">{{ $post->zi_category->name }}
                    </a>
                  </small>
                </span>
              </div>

              <p class="card-text">{!! \Illuminate\Support\Str::limit($post->body, 200, '...') !!}</p>
              <div class="row justify-content-between">
                <div class="col-4">
                  <p class="card-text"><small
                      class="text-muted">{{ $post->created_at->isoFormat('dddd, D MMMM Y') }}</small>
                  </p>
                </div>
                <div class="col-4">
                  <a name="" id="" class="btn btn-sm btn-success px-4 float-end" href="zi/read/{{ $post->slug }}"
                    role="button">read more</a>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@else
<div class="alert alert-warning" role="alert">
  <strong>Dalam pengerjaan!</strong>
</div>
@endif
@endsection