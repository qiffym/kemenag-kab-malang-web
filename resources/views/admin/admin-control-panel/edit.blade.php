@extends('admin.layouts.admin')
@section('admin-layout')
<div class="row text-center">
  <div class="col-md-12 fw-bold fs-3">Edit Profile</div>
  <hr class="mb-4">
</div>
<div class="container mb-5">
  <div class="row border shadow px-5" style="background-color: whitesmoke; margin:0 28%">

    {{-- Form Tambah Admin --}}
    <div class="col-12 py-3">
      <form action="/admin/admin-control-panel/{{ $user->id }}" method="post">
        @csrf
        @method('PUT')
        @if (Auth::user()->role_id === 1)
        <div class="mb-3">
          <label for="status">Status</label>
          <select name="status" id="status" class="form-select">
            <option selected value="{{ $user->status }}">{{ ($user->status == '1')? 'Aktif' : 'Non-Aktif' }}</option>
            <option value="1">Aktif</option>
            <option value="0">Non-Aktif</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="role" class="mb-2">Role</label>
          <select name="role" class="form-select" aria-label="Default select example">
            <option selected value="{{ $user->role_id }}">{{ $user->role->role }}</option>
            @foreach ($roles as $role)
            <option value="{{ $role->id }}">{{ $role->role }}</option>
            @endforeach
          </select>
        </div>
        @else
        <input type="hidden" name="role" value="{{ $user->role_id }}">
        @endif
        <div class="mb-3">
          <label for="name" class="form-label">Nama</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
            value="{{ $user->name }}" required autocomplete="no">
          @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="email" class="mb-2">Email</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
            value="{{ $user->email }}" aria-describedby="emailHelpId" placeholder="kabmalang@example.com" required>
          <small id="emailHelpId" class="form-text text-muted">*gunakan email yang aktif</small>
          @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <label for="ganti-password">Ganti Password</label>
        <div class="ganti-password mb-3 border border-3 py-2 px-4" style="background-color: aliceblue">
          <div class="mb-3">
            <label for="password" class="mb-2">Password Lama</label>
            <input type="password" class="form-control" name="password-lama" id="password-lama"
              placeholder="min. 8 karakter">
          </div>
          <div class="mb-3">
            <label for="password" class="mb-2">Password Baru</label>
            <input type="password" class="form-control" name="new_password" id="new_password"
              placeholder="min. 8 karakter">
          </div>
          <div class="mb-3">
            <label for="password_confirmation" class="mb-2">Konfirmasi Password Baru</label>
            <input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation"
              placeholder="konfirmasi password">
          </div>

          <small class="form-text text-muted">*Kosongkan jika tidak ingin mengganti password</small>
        </div>
        <label for="phoneNumber" class="mb-2">Nomor HP</label>
        <div class="input-group mb-4">
          <span class="input-group-text" id="basic-addon1"><i class="bi bi-phone"></i></span>
          <input type="text" class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber"
            id="phoneNumber" value="{{ $user->phoneNumber }}">
          @error('phoneNumber')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <hr>

        {{-- Batal --}}
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          Batal
        </button>
        <!-- Batal Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <i class="bi bi-exclamation-triangle-fill fs-5"></i>
                <h5 class="modal-title" id="staticBackdropLabel">--Konfirmasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Apakah anda yakini ingin membatalkan perubahan?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a name="batal" id="batal" class="btn btn-danger" href="/admin/admin-control-panel"
                  role="button">Batalkan</a>
              </div>
            </div>
          </div>
        </div>
        <button type="submit" name="tambah" class="btn btn-warning"><i class="bi bi-pencil-square"></i>
          Perbarui</button>
      </form>
    </div>
  </div>
</div>

@endsection