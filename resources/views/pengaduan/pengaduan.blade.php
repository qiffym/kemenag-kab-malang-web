@extends('layouts.submain')
@push('pengaduan', 'active bg-success rounded fw-bold')
@push('pengaduan-active', 'active bg-success rounded')
@push('style-bg')
<style>
  .overlay1 {
    position: relative;
    z-index: -10;
  }

  .overlay1::before {
    content: "";
    display: block;
    position: absolute;
    z-index: -1;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background: #30bab6;
    background: -webkit-linear-gradient(top, #009efd, #2af598);
    background: -o-linear-gradient(top, #009efd, #2af598);
    background: -moz-linear-gradient(top, #009efd, #2af598);
    background: linear-gradient(top, #009efd, #2af598);
    opacity: 0.8;
  }
</style>
@endpush


@section('submain-layout')

<div class="container border shadow py-5" style="background-color: #f5f5f5">
  <div class="row mb-5">
    <div class="col-12 text-center">
      <h6 class="text-uppercase">form pengaduan masyarakat</h6>
      <h2 class="fw-bold">PENGADUAN MASYARAKAT</h2>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-lg-4">
      <h5>Ketentuan</h5>
      <ol class="list-group list-group-numbered list-group-flush">
        <li class="list-group-item">Silahkan dilengkapi Isian Formulir</li>
        <li class="list-group-item">Mohon diisi dengan data yang sebenarnya</li>
        <li class="list-group-item">Jika ada bukti dukung berupa Foto, silahkan diupload</li>
        <li class="list-group-item">Mohon masukkan <span class="text-success">Nomor Whatsapp yang aktif dan
            valid</span>, jika <span class="text-danger">tidak aktif</span> atau <span class="text-danger">tidak
            valid</span> maka <span class="text-danger">laporan tidak akan ditindak lanjuti</span></li>
        <li class="list-group-item">Seluruh data yang anda input akan dijaga kerahasiaannya.</li>
      </ol>
      <hr class="mb-4">
    </div>
    <div class="col-lg-6">
      <div class="container">
        <form action="" method="POST" class="border p-4">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="nama@example.com"
              aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Kami tidak akan membagikan email anda kepada siapapun.</div>
          </div>
          <div class="mb-3">
            <label for="no-wa" class="form-label">Nomor WA Anda</label>
            <input type="number" class="form-control" id="no-wa">
          </div>
          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" rows="3"></textarea>
          </div>
          <div class="mb-3">
            <label for="kategori">Kategori</label>
            <select class="form-select" aria-label="Default select example">
              <option selected>-- Pilih Kategori --</option>
              <option value="1">Layanan Kantor</option>
              <option value="2">Layanan KUA</option>
              <option value="3">Layanan Madrasah</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="pesan" class="form-label">Pesan Anda</label>
            <textarea class="form-control" id="pesan" rows="10" placeholder="Tulis pesan anda disini."></textarea>
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">Pilih Foto</label>
            <input class="form-control" type="file" id="formFile">
          </div>

          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>

      </div>
    </div>
  </div>
</div>

@endsection