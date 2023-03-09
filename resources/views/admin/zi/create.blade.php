@extends('admin.layouts.admin')
@push('content-active', 'active')
@push('kelola-zi-active', 'active')

@section('admin-layout')
<div class="row text-center">
  <div class="col-md-12 fw-bold fs-3">Tulis Berita ZI</div>
  <hr class="mb-4">
</div>
<div class="container">
  <div class="row border shadow mx-5 px-5" style="background-color: whitesmoke">
    <div class="col-12 py-3">
      <form action="/admin/zi" method="post" enctype="multipart/form-data">
        @csrf
        {{-- Kategori --}}
        <div class="mb-3">
          <label for="kategori" class="mb-2">Kategori Area</label>
          <select name="kategori" class="form-select @error('kategori') is-invalid @enderror"
            aria-label="Default select example">
            <option selected value="{{ old('kategori') }}">-- Pilih Kategori Area--</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
          @error('kategori')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        {{-- Title --}}
        <div class="mb-3">
          <label for="title" class="form-label">Judul Berita ZI</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
            value="{{ old('title') }}" required>
          @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        {{-- Content --}}
        <div class="mb-3">
          <label for="bodyContent" class="form-label @error('bodyContent') is-invalid @enderror">Content</label>
          <textarea name="bodyContent" id="bodyContent" class="form-control" rows="20"
            placeholder="Tulis body content disini">{{ old('bodyContent') }}</textarea>
          @error('bodyContent')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        {{-- Image --}}
        <div class="mb-3">
          <label for="image" class="form-label">Masukkan Foto</label>
          <input class="form-control w-50  @error('image') is-invalid @enderror" type="file" name="image" id="image"
            value=" {{ old('image') }}">
          @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <hr>

        <button type="submit" name="tambah" class="btn btn-primary px-5">Tambah</button>
      </form>
    </div>
  </div>
</div>

@endsection

@push('editor')
<script>
  tinymce.init({
      selector: '#bodyContent',
      plugins: [
        'advlist autolink link image lists charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks code fullscreen insertdatetime media nonbreaking',
        'table emoticons template paste help'
      ],
      toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist outdent indent | link image | print preview media fullpage | ' +
        'forecolor backcolor emoticons | help',
      // plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      // toolbar: 'undo redo styleselect bold italic a11ycheck showcomments casechange checklist code export formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Admin',
   });
</script>
@endpush