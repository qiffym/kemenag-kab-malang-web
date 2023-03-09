@extends('admin.layouts.admin')
@push('content-active', 'active')
@push('kelola-zi-active', 'active')

@section('admin-layout')
<div class="row text-center">
  <div class="col-md-12 fw-bold fs-3">Edit Berita ZI</div>
  <hr class="mb-4">
</div>
<div class="container">
  <div class="row border shadow mx-5 px-5" style="background-color: whitesmoke">

    <div class="col-12 py-3">
      <form action="/admin/zi/{{ $post->slug }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        {{-- Kategori --}}
        <div class="mb-3">
          <label for="kategori" class="mb-2">Kategori</label>
          <select name="kategori" class="form-select @error('kategori') is-invalid @enderror"
            aria-label="Default select example">
            <option selected value="{{ $post->zi_category_id }}">{{ $post->zi_category->name }}</option>
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
            value="{{ $post->title }}" required>
          @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        {{-- Content --}}
        <div class="mb-3">
          <label for="bodyContent" class="form-label">Content</label>
          <textarea name="bodyContent" id="bodyContent" class="form-control" rows="20">{{ $post->body }}</textarea>
        </div>
        {{-- Image --}}
        <div class="mb-3">
          <label for="image" class="form-label">Masukkan Foto</label>
          <input class="form-control w-50" type="file" name="image" id="image">
          <small class="text-muted">*Kosongkan jika tidak ingin mengganti gambar</small>
        </div>
        <label class="mb-2" for="tanggal">Tanggal Update</label>


        <hr>

        <a name="batal" id="batal" class="btn btn-secondary px-5" href="/admin/zi" role="button">Batal</a>
        <button type="submit" name="tambah" class="btn btn-primary px-5">Update</button>
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