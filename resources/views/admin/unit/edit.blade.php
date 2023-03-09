@extends('admin.layouts.admin')

@section('admin-layout')
<div class="row text-center">
  <div class="col-md-12 fw-bold fs-3">Edit Berita Satker</div>
  <hr class="mb-4">
</div>
<div class="container">
  <div class="row border shadow mx-5 px-5" style="background-color: whitesmoke">
    <div class="col-12 py-3">
      <form action="/admin/unit/{{ $post->slug }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        {{-- Penulis --}}
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        {{-- Kategori --}}
        <div class="mb-3">
          <label for="kategori" class="mb-2">Kategori</label>
          <select name="kategori" class="form-select @error('kategori') is-invalid @enderror"
            aria-label="Default select example">
            <option selected value="{{ $post->unit_category_id }}">{{ $post->unit_category->name }}</option>
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
        {{-- Judul --}}
        <div class="mb-3">
          <label for="title" class="form-label">Judul Berita</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
            value="{{ $post->title }}" required>
          @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        {{-- Keyword --}}
        <div class="mb-3">
          <label for="keyword" class="form-label">Keyword</label>
          <input type="text" class="form-control @error('keyword') is-invalid @enderror" name="keyword" id="keyword"
            value="{{ $post->keyword }}" placeholder="contoh: graduation, graduasi, perpisahan" required>
          @error('keyword')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        {{-- Content --}}
        <div class="mb-3">
          <label for="bodyContent" class="form-label @error('bodyContent') is-invalid @enderror">Content</label>
          <textarea name="bodyContent" id="bodyContent" class="form-control" rows="20"
            placeholder="Tulis body content disini">{{ $post->body }}</textarea>
          @error('bodyContent')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        {{-- Foto --}}
        <div class="mb-3">
          <label for="image" class="form-label  @error('image') is-invalid @enderror">Masukkan Foto</label>
          <input class="form-control w-50" type="file" name="image" id="image">
          <small class="text-muted">*Kosongkan jika tidak ingin mengganti gambar</small>
          @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        {{-- Tanggal --}}
        <label class="mb-2" for="tanggal">Tanggal Posting</label>
        <div class="input-group mb-3 w-25">
          <span class="input-group-text" id="toggle"><i class="bi bi-calendar"></i></span>
          <input type="text" name="tanggal" id="picker" class="form-control  @error('tanggal') is-invalid @enderror"
            value="{{ $post->publish_at }}">
          @error('tanggal')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <hr>

        <a name="batal" id="batal" class="btn btn-secondary px-5" href="/admin/berita" role="button">Batal</a>
        <button type="submit" name="tambah" class="btn btn-primary px-5">Perbarui</button>
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
<script>
  jQuery.datetimepicker.setLocale('id')
  $("#picker").datetimepicker({
    timepicker: true,
    datepicker:true,
    format: 'Y-m-d H:i',
    mask:true,
    lang:'id',
    i18n: {
      month:['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November','Desember'],
      dayOfWeek: ["Minggu", "Senin", "Selasa", "Rabu","Kamis","Jumat","Sabtu"]
    }
  });
  $("#toggle").on('click', function(){
    $("#picker").datetimepicker('toggle')
  });
</script>

@endpush