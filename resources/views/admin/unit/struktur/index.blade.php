@extends('admin.layouts.admin')
@push('content-active', 'active')
@push('kelola-unit-active', 'active')

@section('admin-layout')
{{-- Header --}}
<div class="row">
  <div class="col-md-12 fw-bold fs-3">Kelola Struktur Organisasi Unit</div>
  <hr class="mb-4">
</div>

{{-- Navigation --}}
<div class="row justify-content-between">
  <div class="col-6">
    <a name="" id="" class="btn btn-secondary" href="/admin/unit" role="button"><i
        class="bi bi-arrow-bar-left"></i>Kembali</a>
    {{-- <a name="" id="" class="btn btn-primary" href="/admin/unit/struktur/create" role="button"><i class="bi bi-plus"></i>
      Tambah Struktur</a> --}}
  </div>
  <div class="col-4">
    <form action="/admin/unit/struktur" method="get">
      <div class="input-group mb-3">
        <input type="text" name="search" class="form-control" placeholder="Cari Struktur..." aria-label="Search"
          aria-describedby="button-addon2" value="{{ request('search') }}">
        <button class="btn btn-success" type="submit" id="button-addon2">
          <i class="bi bi-search"></i></button>
      </div>
    </form>
  </div>
</div>

<div class="col-12 mb-5 mt-4">
  <div class="row row-cols-1 row-cols-md-3 g-5">
    @php $i=1 @endphp
    @foreach ($posts as $post)
    <div class="col">
      <div class="card text-center h-100">
        <div class="card-header fw-bold py-2 px-3">
          {{ $i . '. ' . $post->unit_category->name }}
        </div>
        @if ($post->image_path == null)
        <h5>Gambar Masih Kosong</h5>
        @else
        <img src="{{ asset("assets/img/unit/$post->image_path") }}" class="card-img-top img-thumbnail"
          style="max-width:100%; height:auto;" alt="{{ $post->image_path }}">
        @endif
        <div class="card-body text-center">
          <h5 class="card-title fw-bold">{{ $post->title }}</h5>
        </div>
        <div class="card-footer text-center">
          <small class="text-muted"> ditambahkan pada: {{ $post->created_at->diffForHumans() }}</small>
          <hr class="mx-5 mt-2">
          <small>

            {{-- Tampilkan --}}
            <form action="/admin/unit/struktur/{{ $post->id }}/activate" method="post" class="d-inline-block">
              @csrf
              @method('POST')
              @if ($post->status == 1)
              <button type="submit" name="unshow" id="unshow" class="btn btn-sm btn-outline-success">
                <i class="bi bi-eye-fill"></i></button>
              @else
              <button type="submit" name="show" id="show" class="btn btn-sm btn-outline-danger">
                <i class="bi bi-eye-slash-fill"></i></button>
              @endif
            </form>

            {{-- Update --}}
            <a name="" id="" class="btn btn-sm btn-warning" href="/admin/unit/struktur/{{ $post->id }}/edit"
              role="button">
              <i class="bi bi-pencil-square"></i> Edit
            </a>

          </small>
        </div>
      </div>
    </div>
    @php $i++ @endphp
    @endforeach
  </div>
</div>
@endsection