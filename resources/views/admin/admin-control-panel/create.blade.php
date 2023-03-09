@extends('admin.layouts.admin')
@section('admin-layout')
<div class="row text-center">
  <div class="col-md-12 fw-bold fs-3">Tambah Admin Baru</div>
  <hr class="mb-4">
</div>
<div class="container mb-5">
  <div class="row border shadow px-5" style="background-color: whitesmoke; margin:0 28%">

    {{-- Form Tambah Admin --}}
    <div class="col-12 py-3">
      <form action="/admin/admin-control-panel" method="post">
        @csrf
        <div class="mb-3">
          <label for="role" class="mb-2">Role</label>
          <select name="role" class="form-select @error('role') is-invalid @enderror"
            aria-label="Default select example">
            <option selected value="">-- Pilih Role Admin --</option>
            @foreach ($roles as $role)
            <option value="{{ $role->id }}">{{ $role->role }}</option>
            @endforeach
          </select>
          @error('role')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">Nama</label>
          <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="name" required
            autocomplete="no" value="{{ old('name') }}">
          @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="email" class="mb-2">Email</label>
          <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" id="email"
            aria-describedby="emailHelpId" placeholder="kabmalang@example.com" value="{{ old('email') }}" required>
          <small id="emailHelpId" class="form-text text-muted">*gunakan email yang aktif</small>
          @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="password" class="mb-2">Password</label>
          <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password"
            id="password" placeholder="min. 8 karakter">
          @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="password_confirmation" class="mb-2">Konfirmasi Password</label>
          <input type="password" class="form-control  @error('password_confirmation') is-invalid @enderror"
            name="password_confirmation" id="password_confirmation" placeholder="konfirmasi password">
          @error('password_confirmation')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <label for="phoneNumber" class="mb-2">Nomor HP</label>
        <div class="input-group mb-4">
          <span class="input-group-text" id="basic-addon1"><i class="bi bi-phone"></i></span>
          <input type="number" class="form-control  @error('phoneNumber') is-invalid @enderror" name="phoneNumber"
            id="phoneNumber" value="{{ old('phoneNumber') }}">
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
                Apakah anda ingin membatalkan penambahan admin baru?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                <a name="batal" id="batal" class="btn btn-danger" href="/admin/admin-control-panel"
                  role="button">Batalkan</a>
              </div>
            </div>
          </div>
        </div>
        <button type="submit" name="tambah" class="btn btn-primary"><i class="bi bi-plus"></i> Tambah</button>
      </form>
    </div>
  </div>
</div>

@endsection