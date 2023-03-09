@extends('admin.layouts.admin')
@section('admin-layout')
<div class="row justify-content-center">
  <div class="col-3 text-center">
    <img src="{{ asset("assets/icon/icon-user.png") }}" class="img-thumbnail rounded-circle shadow" alt="profile"
      width="200">
    <br>
    <h3 class="pt-2 d-inline-block">{{ $user->name }} <i class="bi bi-patch-check-fill text-success"></i></h3> <br>
    <p class="fs-5 d-inline-block">{{ $user->role->role }}</p>
  </div>
  <div class="col-5">
    <div class="row">
      <div class="col">
        <table class="table fs-3">
          <thead>
            <tr>
              <th colspan="2">My Profile</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td scope="row">Nama</td>
              <td>{{ $user->name }}</td>
            </tr>
            <tr>
              <td scope="row">Email</td>
              <td>{{ $user->email }}</td>
            </tr>
            <tr>
              <td scope="row">No. HP</td>
              <td>{{ $user->phoneNumber }}</td>
            </tr>
            <tr>
              <td scope="row">Role</td>
              <td>{{ $user->role->role }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-3 text-center">
    {{-- Update --}}
    <a name="edit" id="edit" class="btn btn-warning" href="/admin/admin-control-panel/{{ Auth::user()->id }}/edit"
      role="button">
      <i class="bi bi-pencil-square"></i> Edit Profile
    </a>
    {{-- Delete --}}
    <a name="delete" id="delete" class="btn btn-danger delete" href="#" role="button" data-id="{{ $user->id }}"
      data-name="{{ $user->name }}" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      <i class="bi bi-trash"></i> Hapus Akun
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
            <div class="modal-body text-start">
              Jika menghapus akun anda, maka <span class="text-danger">semua postingan yang anda buat juga akan
                terhapus!!</span> <br>
              Apakah anda yakin ingin menghapus akun anda <span class="namaAdmin fw-bold">Nama Admin</span>?
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
  </div>
</div>

<div style="margin-bottom: 30%"></div>

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