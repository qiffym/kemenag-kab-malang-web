@extends('admin.layouts.admin')
@push('layanan-active', 'active')
@push('kelola-faq-active', 'active')

@section('admin-layout')

<div class="row text-center">
  <div class="col-md-12 fw-bold fs-3">Edit FAQ</div>
  <hr class="mb-4">
</div>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <form action="/admin/faq/{{ $post->id }}" method="post">
        @csrf
        @method('PUT')
        {{-- Question --}}
        <div class="mb-3">
          <label for="question" class="form-label">Pertanyaan</label>
          <input type="text" class="form-control @error('question') is-invalid @enderror" name="question" id="question"
            value="{{ $post->question }}" required>
          @error('question')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        {{-- Content --}}
        <div class="mb-3">
          <label for="answer" class="form-label @error('answer') is-invalid @enderror">Jawaban</label>
          <textarea name="answer" id="answer" class="form-control" rows="10"
            placeholder="Tulis body content disini">{{ $post->answer }}</textarea>
          @error('answer')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <hr>

        <a name="batal" id="batal" class="btn btn-secondary px-4" href="/admin/faq" role="button">Batal</a>
        <button type="submit" name="tambah" class="btn btn-primary px-5">Perbarui</button>
      </form>
    </div>
  </div>
</div>

@push('editor')
<script>
  tinymce.init({
      selector: '#answer',
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
@endsection