@extends('layouts.main')
@section('main-layout')
{{-- {{ Breadcrumbs::render('video') }} --}}
<section id="video">
  <div class="row">
    <div class="col-12">
      <h3 class="body-title bg-success fw-bold text-uppercase text-white py-2 ps-4"><i class="fab fa-youtube pe-1"></i>
        Kumpulan Video
      </h3>
    </div>
  </div>
  <div class="row row-cols-1 row-cols-md-2 g-4">
    <div class="col">
      <div class="card h-100">
        <a href="#" class="text-decoration-none text-dark">
          <img src="{{ asset("assets/img/thumb/thumb1.jpg") }}" class="card-img-top bg-dark"
            style="max-width: 100%; height: auto;" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
          </div>
        </a>
        <div class="card-footer">
          <small class="text-muted">Last updated 3 mins ago</small>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100">
        <a href="#" class="text-decoration-none text-dark">
          <img src="{{ asset("assets/img/thumb/thumb3.png") }}" class="card-img-top bg-dark"
            style="max-width: 100%; height: auto; object-fit: contain" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
          </div>
        </a>
        <div class="card-footer">
          <small class="text-muted">Last updated 3 mins ago</small>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100">
        <a href="#" class="text-decoration-none text-dark">
          <img src="{{ asset("assets/img/thumb/thumb2.jpg") }}" class="card-img-top bg-dark"
            style="max-width: 100%; height: auto;" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
          </div>
        </a>
        <div class="card-footer">
          <small class="text-muted">Last updated 3 mins ago</small>
        </div>
      </div>
    </div>

  </div>
</section>
@endsection