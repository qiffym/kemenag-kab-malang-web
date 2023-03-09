@extends('admin.layouts.admin')
@push('content-active', 'active')
@push('kelola-header-slide', 'active')

@section('admin-layout')
<div class="row">
  <div class="col-md-12 fw-bold fs-3">Kelola Home Header Slide</div>
  <hr class="mb-4">
</div>
<div class="row justify-content-between mb-5">
  <div class="col-2">
    <a name="" id="" class="btn btn-primary" href="/admin/header-slide/create" role="button"><i class="bi bi-plus"></i>
      Tambah
      Header Slide</a>
  </div>
  <div class="col-4">
    <form action="/admin/header-slide" method="get">
      <div class="input-group mb-3">
        <input type="text" name="search" class="form-control" placeholder="Cari Header Slide..." aria-label="Search"
          aria-describedby="button-addon2" value="{{ request('search') }}">
        <button class="btn btn-success" type="submit" id="button-addon2">
          <i class="bi bi-search"></i></button>
      </div>
    </form>
  </div>
</div>
<div class="row">
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
  <div class="col-12 text-center">
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

  <div class="col-12 mb-5">
    <div class="row row-cols-1 row-cols-md-4 g-4">
      @foreach ($slides as $post)
      <div class="col">
        <div class="card h-100">
          <img src="{{ asset("assets/img/header-slide/$post->image_path") }}" class="card-img-top img-thumbnail h-100"
            alt="{{ $post->image_path }}">
          <div class="card-body text-center">
            <h5 class="card-title fw-bold">{{ $post->title }}</h5>
          </div>
          <div class="card-footer text-center">
            <small class="text-muted"> ditambahkan pada: {{ $post->created_at->diffForHumans() }}</small>
            <hr class="mx-5 mt-2">
            <small>

              {{-- Tampilkan --}}
              <form action="/admin/header-slide/{{ $post->id }}/activate" method="post" class="d-inline-block">
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
              <a name="" id="" class="btn btn-sm btn-warning" href="/admin/header-slide/{{ $post->id }}/edit"
                role="button">
                <i class="bi bi-pencil-square"></i>
              </a>
              {{-- Delete --}}
              <a name="delete" id="delete" class="btn btn-sm btn-danger delete" href="#confirm-delete" role="button"
                data-id="{{ $post->id }}" data-title="{{ $post->title }}" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop">
                <i class="bi bi-trash"></i>
              </a>
              <!-- Delete Modal -->
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                      <div class="modal-body">
                        Apakah anda yakin ingin menghapus postingan <strong id="judulPost">Judul</strong> ?
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
            </small>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@push('deleteHeaderSlide')
<script>
  $(document).on('click','.delete',function(){
         let id = $(this).attr('data-id');
         let title = $(this).attr('data-title');
         $('#id').val(id);
         $('#delModalForm').attr('action','/admin/header-slide/' + id);
         $('#judulPost').html(title);
    });
</script>
@endpush
@endsection