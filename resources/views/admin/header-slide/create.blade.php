@extends('admin.layouts.admin')

@section('admin-layout')
<div class="row text-center">
  <div class="col-md-12 fw-bold fs-3">Tambah Header Slide</div>
  <hr class="mb-4">
</div>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <form action="/admin/header-slide" method="post" enctype="multipart/form-data">
        @csrf
        {{-- Judul --}}
        <div class="mb-3">
          <label for="title" class="form-label">Judul</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
            value="{{ old('title') }}" required>
          @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        {{-- Foto --}}
        <div class="mb-3">
          <label for="image" class="form-label  @error('image') is-invalid @enderror">Masukkan Gambar</label>
          <input class="form-control w-50" type="file" name="image" id="image">
          @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <hr>
        <a name="batal" id="batal" class="btn btn-secondary px-4" href="/admin/header-slide" role="button">Batal</a>
        <button type="submit" name="tambah" class="btn btn-primary px-5">Tambah</button>
      </form>
    </div>
  </div>
</div>
@endsection