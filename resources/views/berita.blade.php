@extends('layouts.main')

@section('main-layout')
{{ Breadcrumbs::render('berita') }}
<div class="row mb-2 justify-content-between">
  <div class="col-6 pt-3">
    <h3 class="fw-bold fs-2">BERITA</h3>
    @if (!is_null(request('category')))
    <h4>{{ $subtitle }}</h4>
    @endif
  </div>
  <div class="col-5 pt-3">
    <form action="/berita" method="get">
      @if (request('category'))
      <input type="hidden" name="category" value="{{ request('category') }}">
      @endif
      <div class="input-group mb-3">
        <input type="text" name="search" class="form-control" placeholder="Cari Berita..." aria-label="Search"
          aria-describedby="button-addon2" value="{{ request('search') }}">
        <button class="btn btn-outline-success" type="submit" id="button-addon2">
          <i class="fa fa-search"></i>
        </button>
      </div>
    </form>
  </div>
</div>
@if ($posts->count())
{{-- highlight --}}
@if (is_null(request('search')) and is_null(request('category')))
<section id="highlight-berita">
  <div class="row">
    <div class="col-12 mb-4">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          @foreach ($highlights as $post)
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $loop->index }}"
            class="{{ $loop->first ? 'active' : '' }}" aria-current="true" aria-label="Slide 1"></button>
          @endforeach
        </div>
        <div class="carousel-inner">
          @foreach ($highlights as $post)
          <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <a href="/read/{{ $post->slug }}">
              <img src="assets/img/post/{{ $post->image_path }}" class="d-block w-100 img-thumbnail bg-dark"
                alt="{{ $post->title }}">
            </a>
            {{-- <img src="https://source.unsplash.com/random" class="d-block w-100" alt="{{ $post->title }}"> --}}
            <div class="carousel-caption d-none d-md-block">
              <a href="/read/{{ $post->slug }}" class="text-decoration-none text-white">
                <div class="py-2 px-4" style="background-color: rgba(0, 0, 0, 0.5)">
                  <h5>{{ $post->title }}</h5>
                  <p>{!! $post->excerpt !!}</p>
                  <small>{{ $post->created_at->isoFormat('dddd, D MMMM Y') }}</small>
                </div>
              </a>
            </div>
          </div>

          @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div>
</section>
<hr>
@else
<div class="mb-4"></div>
@endif
{{-- highlight --}}


{{-- list berita --}}
<section id="list-berita">
  <div class="row">

    @foreach ($posts as $post)
    <div class="col-12 mb-4">
      <div class="card mb-4">
        <div class="row g-0 align-items-center">
          <div class="col-md-4">
            <img src="{{ asset('') }}/assets/img/post/{{ $post->image_path }}"
              class="card-img-top img-fluid rounded p-0 bg-dark" alt="image">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title fw-bold"><a class="text-decoration-none text-dark"
                  href="/read/{{ $post->slug }}">{{ $post->title }}</a></h5>
              <div class="mb-2">
                <span class="author"><small class="text-muted"><i class="fas fa-user fa-xs"></i>
                    {{ $post->author->name }} | </small>
                </span>
                <span class="category">
                  <small><i class="fas fa-bookmark fa-xs text-muted"></i>
                    <a class="text-decoration-none text-success"
                      href="/berita?category={{ $post->post_category->slug }}">{{ $post->post_category->name }}
                    </a>
                  </small>
                </span>
              </div>

              <p class="card-text">{!! $post->excerpt !!}</p>
              <div class="row justify-content-between">
                <div class="col-4">
                  <p class="card-text"><small
                      class="text-muted">{{ \Carbon\Carbon::parse($post->publish_at)->isoFormat('dddd, D MMMM Y') }}</small>
                  </p>
                </div>
                <div class="col-4">
                  <a name="" id="" class="btn btn-sm btn-success px-4 float-end" href="/read/{{ $post->slug }}"
                    role="button">read more</a>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <hr>

  </div>
</section>
{{-- list berita --}}

{{-- pagination --}}
<section id="pagination">
  <div class="d-flex justify-content-center">
    @if(request('category') and request('search'))
    {!! $posts->appends(['category' => request('category'),'search' => request('search')])->links() !!}
    @elseif (request('category'))
    {!! $posts->appends(['category' => request('category')])->links() !!}
    @elseif(request('search'))
    {!! $posts->appends(['search' => request('search')])->links() !!}
    @else
    {!! $posts->links() !!}
    @endif
  </div>
</section>
{{-- pagination --}}

@else
<div class="row">
  <div class="col text-center">
    <div class="alert alert-warning" role="alert">
      <strong>Berita tidak ditemukan!</strong>
    </div>
  </div>
</div>
@endif



@endsection