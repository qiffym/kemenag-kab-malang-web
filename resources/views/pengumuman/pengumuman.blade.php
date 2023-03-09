@extends('layouts.main')
@section('main-layout')
{{ Breadcrumbs::render('pengumuman') }}
<div class="row mb-2 justify-content-between">
  <div class="col-6 pt-3">
    <h3 class="fw-bold fs-2">PENGUMUMAN</h3>
  </div>
  <div class="col-5 pt-3">
    <form action="/pengumuman" method="get">
      <div class="input-group mb-3">
        <input type="text" name="search" class="form-control" placeholder="Cari Pengumuman..." aria-label="Search"
          aria-describedby="button-addon2" value="{{ request('search') }}">
        <button class="btn btn-outline-success" type="submit" id="button-addon2">
          <i class="fa fa-search"></i>
        </button>
      </div>
    </form>
  </div>
</div>

<hr>

@if ($posts->count())
<div class="list-group list-group-flush">
  @foreach ($posts as $post)
  <a href="/pengumuman/read/{{ $post->slug }}" class="list-group-item list-group-item-action list-group-item-success"
    aria-current="true">
    <i class="fas fa-chevron-right fa-sm"></i> {{ $post->title }}
  </a>
  @endforeach
</div>

{{-- pagination --}}
<section id="pagination mt-5">
  <div class="d-flex justify-content-center">
    {!! $posts->links() !!}
  </div>
</section>
{{-- pagination --}}

@else
<div class="alert alert-warning" role="alert">
  <strong>Tidak ada pengumuman!</strong>
</div>
@endif
@endsection