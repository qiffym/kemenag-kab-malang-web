@extends('admin.layouts.admin')

@section('admin-layout')

<div class="row">
  <div class="col-md-12 fw-bold fs-3">Dashboard</div>
  <hr class="mb-4">
</div>
{{-- card --}}
<div class="row">
  <div class="col-md-3 mb-3 ">
    <div class="card text-white bg-primary h-100">
      <div class="card-header"><i class="bi bi-pie-chart-fill fs-4"></i></div>
      <div class="card-body">
        <h5 class="card-title">Info Postingan</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
          content.</p>
      </div>
    </div>
  </div>
  <div class="col-md-3 mb-3 ">
    <div class="card text-white bg-warning h-100">
      <div class="card-header"><i class="bi bi-people-fill fs-4"></i></div>
      <div class="card-body">
        <h5 class="card-title">Info Pengunjung</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
          content.</p>
      </div>
    </div>
  </div>
  <div class="col-md-3 mb-3 ">
    <div class="card text-white bg-success h-100">
      <div class="card-header"><i class="bi bi-envelope-fill fs-4"></i></div>
      <div class="card-body">
        <h5 class="card-title">Mail Box</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
          content.</p>
      </div>
    </div>
  </div>
  <div class="col-md-3 mb-3 ">
    <div class="card text-white bg-danger h-100">
      <div class="card-header"><i class="bi bi-youtube fs-4"></i></div>
      <div class="card-body">
        <h5 class="card-title">Tutorial Artikel / Berita</h5>
        <p class="card-text">Untuk mengisi artikel atau berita, kami menyediakan tutorialnya secara online, silakan
          lihat tutorial video ini: </p>
        <a name="" id="" class="btn btn-primary btn-sm d-block" href="https://youtu.be/I2NRQp2m5MU" target="_blank"
          role="button">https://youtu.be/I2NRQp2m5MU</a>
      </div>
    </div>
  </div>
</div>
{{-- akhir card --}}

{{-- statistik --}}
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        Statistik Pengunjung
      </div>
      <div class="card-body">
        <canvas id="myChart" width="400" height="120"></canvas>
      </div>
    </div>
  </div>
</div>
{{-- akhir statistik --}}
@endsection