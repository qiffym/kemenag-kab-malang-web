@extends('admin.layouts.admin')
@push('layanan-active', 'active')
@push('kelola-faq-active', 'active')

@section('admin-layout')
{{-- Header --}}
<div class="row">
  <div class="col-md-12 fw-bold fs-3">Kelola FAQs</div>
  <hr class="mb-4">
</div>
<div class="row justify-content-between mb-4">
  <div class="col-2">
    <a name="" id="" class="btn btn-primary" href="/admin/faq/create" role="button"><i class="bi bi-plus"></i>
      Tambah
      FAQ</a>
  </div>
  <div class="col-4">
    <form action="/admin/faq" method="get">
      <div class="input-group mb-3">
        <input type="text" name="search" class="form-control" placeholder="Cari Pertanyaan / Jawaban..."
          aria-label="Search" aria-describedby="button-addon2" value="{{ request('search') }}">
        <button class="btn btn-success" type="submit" id="button-addon2">
          <i class="bi bi-search"></i></button>
      </div>
    </form>
  </div>
</div>

{{-- Accordion --}}
@if ($posts->count())
<div class="row justify-content-center">
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
      <path
        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path
        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
    </symbol>
  </svg>

  @if (session()->has('message'))
  <div class="col-md-10 text-center">
    <div class="alert alert-primary alert-dismissible fade show d-flex align-items-center" role="alert">
      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
        <use xlink:href="#info-fill" /></svg>
      <div>
        {{ session()->get('message') }}
      </div>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
  @endif

  <div class="col-md-10">
    <div class="accordion" id="accordionPanelsStayOpenExample">
      @foreach ($posts as $post)
      <div class="accordion-item">
        <h2 class="accordion-header" id="{{ "panelsStayOpen-headingId".$post->id }}">
          <button class="accordion-button" type="button" data-bs-toggle="collapse"
            data-bs-target="{{ "#panelsStayOpen-collapseId".$post->id }}" aria-expanded="true"
            aria-controls="{{ "panelsStayOpen-collapseId".$post->id }}">
            {{-- Action --}}
            {{-- Update --}}
            <a name="" id="" class="btn btn-sm btn-warning" href="/admin/faq/{{ $post->id }}/edit" role="button">
              <i class="bi bi-pencil-square"></i>
            </a>
            {{-- Delete --}}
            <a name="delete" id="delete" class="btn btn-sm btn-danger delete" href="#confirm-delete" role="button"
              data-id="{{ $post->id }}" data-title="{{ $post->question }}" data-bs-toggle="modal"
              data-bs-target="#staticBackdrop">
              <i class="bi bi-trash"></i>
            </a>
            <span class="mx-2"><i class="bi bi-grip-vertical fs-4"></i></span>
            <span class="fs-5">{{ "#".$loop->iteration." ".$post->question }}</span>
          </button>
        </h2>
        <div id="{{ "panelsStayOpen-collapseId".$post->id }}" class="accordion-collapse collapse "
          aria-labelledby="{{ "panelsStayOpen-headingId".$post->id }}">
          <div class="accordion-body lead">
            {!! $post->answer !!}
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>

</div>

@else
<div class="col-12 text-center">
  <div class="alert alert-warning d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
      <use xlink:href="#exclamation-triangle-fill" /></svg>
    <div class="fw-bold">
      FAQs Kosong.
    </div>
  </div>
</div>
@endif

{{-- Delete Modal --}}
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
          <use xlink:href="#exclamation-triangle-fill" /></svg>
        <h5 class="modal-title" id="staticBackdropLabel">Delete Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="delModalForm" method="post">
        @csrf
        @method('delete')
        <div class="modal-body text-center">
          Apakah anda yakin ingin menghapus FAQ<br> "<strong id="judulPost">Judul</strong>"
          ?
        </div>
        <div class="modal-footer">
          <input id="id" name="id" hidden value="">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>

@push('deleteFAQ')
<script>
  $(document).on('click','.delete',function(){
         let id = $(this).attr('data-id');
         let title = $(this).attr('data-title');
         $('#id').val(id);
         $('#delModalForm').attr('action','/admin/faq/' + id);
         $('#judulPost').html(title);
    });
</script>
@endpush

@endsection