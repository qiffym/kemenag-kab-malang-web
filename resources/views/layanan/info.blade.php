@extends('layouts.submain')

@section('submain-layout')


<div class="row mb-4">
  <div class="col-12 display-3 text-center">
    Info Layanan
    <hr class="dropdown-divider">
    @auth
    <a name="tambahInfo" id="tambahInfo" class="btn btn-primary" href="#" role="button" data-bs-toggle="modal"
      data-bs-target="#staticBackdrop">+ Tambah Layanan</a>
    @endauth
  </div>
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
      <path
        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
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
</div>

<div class="row row-cols-1 row-cols-md-2 g-4">
  {{-- Layanan Online --}}
  <div class="col">
    <div class="card h-100 text-white bg-success">
      <div class="card-header text-center fs-3">Layanan Online</div>
      <div class="card-body">
        <h5 class="card-title">Berikut adalah layanan online:</h5>
        <ol class="list-group list-group-numbered list-group-flush fs-5">
          @foreach ($online as $post)
          <li class="list-group-item list-group-item-success">
            {{-- Action --}}
            @auth
            <small>
              {{-- Update --}}
              <a name="update" id="update" class="btn btn-sm btn-warning" href="#edit" role="button"
                data-id="{{ $post->id }}" data-kategori="{{ $post->category }}" data-title="{{ $post->title }}"
                data-url="{{ $post->link }}" data-bs-toggle="modal" data-bs-target="#updateModal">
                <i class="far fa-edit"></i>
              </a>
              {{-- Delete --}}
              <a name="delete" id="delete" class="btn btn-sm btn-danger delete" href="#confirm-delete" role="button"
                data-id="{{ $post->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal">
                <i class="fas fa-minus-circle"></i>
              </a>
            </small>
            <i class="fas fa-grip-lines-vertical me-2"></i>
            @endauth
            <a href="{{ $post->link }}" class="list-group-item-action" target="_blank">{{$post->title }}</a>
          </li>
          @endforeach
        </ol>
      </div>
    </div>
  </div>

  {{-- Layanan Offline --}}
  <div class="col">
    <div class="card h-100 text-dark bg-light">
      <div class="card-header text-center fs-3">Layanan Offline</div>
      <div class="card-body">
        <h5 class="card-title">Berikut adalah layanan offline:</h5>
        <ol class="list-group list-group-numbered list-group-flush fs-5">
          @foreach ($offline as $post)
          <li class="list-group-item list-group-item-secondary">
            {{-- Action --}}
            @auth
            <small>
              {{-- Update --}}
              <a name="update" id="update" class="btn btn-sm btn-warning" href="#edit" role="button"
                data-id="{{ $post->id }}" data-kategori="{{ $post->category }}" data-title="{{ $post->title }}"
                data-url="{{ $post->link }}" data-bs-toggle="modal" data-bs-target="#updateModal">
                <i class="far fa-edit"></i>
              </a>
              {{-- Delete --}}
              <a name="delete" id="delete" class="btn btn-sm btn-danger" href="#confirm-delete" role="button"
                data-id="{{ $post->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal">
                <i class="fas fa-minus-circle"></i>
              </a>
            </small>
            <i class="fas fa-grip-lines-vertical me-2"></i>
            @endauth
            <a href="{{ $post->link }}" class="list-group-item-action" target="_blank">{{$post->title }}</a>
          </li>
          @endforeach
        </ol>
      </div>
    </div>
  </div>

</div>

<!-- Modal Create -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="staticBackdropLabel">Tambah Info Layanan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ url('/layanan/info') }}" method="post">
        @csrf
        @method('POST')
        <div class="modal-body">
          <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Kategori</label>
            <select name="kategori" class="form-select  @error('kategori') is-invalid @enderror" id="kategori">
              <option selected value="{{ old('kategori') }}">--Pilih Jenis Layanan--</option>
              <option value="1">Layanan Online</option>
              <option value="0">Layanan Offline</option>
            </select>
            @error('kategori')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="floatingInput" name="title"
              placeholder="Masukkan Judul">
            <label for="floatingInput">Judul</label>
            @error('title')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating mb-3">
            <input type="url" class="form-control @error('link') is-invalid @enderror" id="floatingInput" name="link"
              placeholder="Masukkan URL">
            <label for="floatingInput">URL</label>
            @error('link')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>
        <div class="modal-footer">
          <input id="id" name="id" hidden value="">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Update -->
<div class="modal fade" id="updateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="updateModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="updateModalLabel">Edit Info Layanan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="editModalForm" method="post">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="form-floating mb-3">
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
              placeholder="Masukkan Judul" value="">
            <label for="title">Judul</label>
            @error('title')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating mb-3">
            <input type="url" class="form-control @error('link') is-invalid @enderror" id="link" name="link"
              placeholder="Masukkan URL" value="">
            <label for="link">URL</label>
            @error('link')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>
        <div class="modal-footer">
          <input id="id" name="id" hidden value="">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Perbarui</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="deleteModalLabel">Edit Info Layanan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="deleteModalForm" method="post">
        @csrf
        @method('delete')
        <div class="modal-body">
          Apakah anda yakin ingin menghapus info layanan ini?
        </div>
        <div class="modal-footer">
          <input id="id" name="id" hidden value="">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger"><i class="fas fa-minus-circle fa-xs"></i> Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>

@push('infoLayanan')
<script>
  // update
  $(document).on('click','#update',function(){
         let id = $(this).attr('data-id');
         let category = $(this).attr('data-kategori');
         let title = $(this).attr('data-title');
         let link = $(this).attr('data-url');
         $('#title').val(title);
         $('#link').val(link);
         $('#editModalForm').attr('action','/layanan/info/' + id);
    });

    // delete
    $(document).on('click','#delete',function(){
         let id = $(this).attr('data-id');
         $('#deleteModalForm').attr('action','/layanan/info/' + id);
    });
</script>
@endpush

@endsection