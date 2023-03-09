@extends('admin.layouts.admin')

@section('admin-layout')
<div class="row">
  <div class="col-md-12 fw-bold fs-3">Admin Control Panel</div>
  <hr class="mb-4">
</div>
<div class="row justify-content-between">
  <div class="col-2">
    <a name="" id="" class="btn btn-primary" href="/admin/admin-control-panel/create" role="button">
      <i class="bi bi-person-plus-fill"></i> Tambah Admin Baru
    </a>
  </div>
  <div class="col-3">
    <form action="/admin/admin-control-panel" method="get">
      <div class="input-group mb-3">
        <input type="text" name="search" class="form-control" placeholder="Cari Admin..." aria-label="Search"
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
  {{-- Informasi --}}
  @if (session()->has('message'))
  <div class="col-12 text-center">
    <div class="alert alert-primary d-flex align-items-center" role="alert">
      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
        <use xlink:href="#info-fill" /></svg>
      <div>
        {{ session()->get('message') }}
      </div>
    </div>
  </div>
  @endif

  {{-- Tabel Admin --}}
  @if ($users->count())
  <div class="col-12">
    <table cellpadding="0" class="table table-striped table-hover">
      Total Admin : <span class="badge bg-secondary">{{ count($users) }}</span>
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Nama</th>
          <th scope="col">Email</th>
          <th scope="col">Role</th>
          <th scope="col">No. Hp</th>
          <th scope="col">Last Login</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @php
        $i=1;
        @endphp
        @foreach ($users as $user)
        <tr>
          <th class="text-center" scope="row">{{ $i }}</th>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->role->role }}</td>
          <td>{{ $user->phoneNumber }}</td>
          @if ($user->isOnline())
          <td><i class="bi bi-record-circle text-success"></i> Sedang Online</td>
          @else
          <td>{{ ($user->last_login != "") ? \Carbon\Carbon::parse($user->last_login)->diffForHumans() : "---" }}</td>
          @endif

          <td>
            {{ ($user->status == '1')?'Aktif' : 'Non-Aktif' }}
          </td>

          <td>
            {{-- Update --}}
            <a name="edit" id="edit" class="btn btn-warning" href="/admin/admin-control-panel/{{ $user->id }}/edit"
              role="button">
              <i class="bi bi-pencil-square"></i>
            </a>
            {{-- Delete --}}
            <a name="delete" id="delete" class="btn btn-danger delete" href="#" role="button" data-id="{{ $user->id }}"
              data-name="{{ $user->name }}" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              <i class="bi bi-trash"></i>
            </a>
            <!-- Delete Modal -->
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
                    <div class="modal-body">
                      Jika anda menghapus admin ini maka semua postingan yang ditulis oleh <span
                        class="namaAdmin fw-bold"></span> akan terhapus juga. <br><br>
                      Apakah anda yakin ingin menghapus admin <span class="namaAdmin fw-bold">Nama Admin</span>?
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
          </td>
        </tr>
        @php
        $i++;
        @endphp
        @endforeach
      </tbody>
    </table>
  </div>
  @else
  <div class="col-12">
    <div class="alert alert-warning" role="alert">
      <strong>User kosong</strong>
    </div>
  </div>
  @endif
</div>

@push('deleteAdmin')
<script>
  $(document).on('click','.delete',function(){
         let id = $(this).attr('data-id');
         let name = $(this).attr('data-name');
         $('#id').val(id);
         $('#delModalForm').attr('action','/admin/admin-control-panel/' + id);
         $('.namaAdmin').html(name);
    });
</script>
@endpush
@endsection