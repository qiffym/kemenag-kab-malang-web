@extends('layouts.main')
@section('main-layout')
{{-- Header Section --}}
@push('header-section')
@include('partials.header')
@endpush

{{-- Highlight Berita --}}
@if ($slides->count())
<section id="header-slide">
  <div class="row">
    <div class="col-12 mb-4">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          @foreach ($slides as $post)
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $loop->index }}"
            class="{{ $loop->first ? 'active' : '' }}" aria-current="true" aria-label="Slide 1"></button>
          @endforeach
        </div>
        <div class="carousel-inner">
          @foreach ($slides as $post)
          <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <img src="{{ asset("assets/img/header-slide/$post->image_path") }}"
              class="d-block img-thumbnail img-responsive" alt="{{ $post->title }}">
          </div>
          @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div>
</section>
@endif

{{-- Akhir Highlight Berita --}}

{{-- Card Berita --}}
<section id="card-berita">
  <div class="row">
    <div class="col-12">
      <h3 class="body-title bg-success fw-bold text-uppercase text-white py-2 ps-4"><i class="fas fa-newspaper pe-1">
        </i>
        berita terkini</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="col-12 mb-2">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-2">
          @php
          use Illuminate\Support\Str;
          use Carbon\Carbon;
          @endphp
          @foreach ($posts as $post)
          <div class="col">
            <div class="card h-100">
              <a class="text-decoration-none text-dark" href="/read/{!! $post->slug !!}">
                <img src="{{ asset("assets/img/post/$post->image_path") }}" class="card-img-top bg-dark"
                  style="max-width: 100%; height: auto;" alt="...">
                <div class="card-body">
                  <h5 class="card-title fw-bold">{{ Str::limit($post->title, 60, '...') }}</h5>
              </a>
              <div class="mb-2">
                <span class="author"><small class="text-muted"><i class="fas fa-user fa-xs"></i>
                    {{ $post->author->name }} </small>
                </span> <br>
                <span class="category">
                  <small><i class="fas fa-bookmark fa-xs text-muted"></i>
                    <a class="text-decoration-none text-success"
                      href="/berita?category={{ $post->post_category->slug }}">{{ $post->post_category->name }}
                    </a>
                  </small>
                </span>
              </div>
              <p class="card-text">
                {!! $post->excerpt !!}
              </p>
            </div>
            <div class="card-footer d-flex justify-content-between">
              <small class="text-muted">{{ Carbon::parse($post->publish_at)->isoFormat('dddd, D MMM Y') }}</small>
              <a name="readMore" id="readMore" class="btn btn-sm btn-success btn-sm rounded"
                href="/read/{{ $post->slug }}" role="button">read more..</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    {{-- Card Berita --}}
  </div>
  </div>
  <div class="row mt-3">
    <div class="col d-flex justify-content-end">
      <a name="showall" id="showall" class="btn btn-sm btn-success px-4" href="/berita" role="button">show all</a>
    </div>
  </div>
</section>
{{-- Akhir Card Berita --}}

<hr>

{{-- Video --}}
<section id="video">
  <div class="row">
    <div class="col-12">
      <h3 class="body-title bg-success fw-bold text-uppercase text-white py-2 ps-4"><i class="fas fa-video pe-1"></i>
        video</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-12 mb-4">
      <div class="owl-carousel owl-theme">
        <div class="item">
          <a href="#"><img src="assets/img/thumb/thumb1.jpg" alt="img"></a>
        </div>
        <div class="item">
          <a href="#"><img src="assets/img/thumb/thumb2.jpg" alt="img"></a>
        </div>
        <div class="item">
          <a href="#"><img src="assets/img/thumb/thumb3.png" alt="img"></a>
        </div>
        <div class="item">
          <a href="#"><img src="assets/img/thumb/thumb4.jpg" alt="img"></a>
        </div>
      </div>
    </div>
  </div>
</section>
{{-- Akhir Video --}}

{{-- Satker --}}
<section id="satker">
  <div class="row">
    <div class="col-12">
      <h3 class="body-title bg-success fw-bold text-uppercase text-white py-2 ps-4"><i
          class="fas fa-graduation-cap pe-1"></i> Satuan Kerja</h3>
    </div>
  </div>
  <div class="row">
    <div class="col text-center">
      <div class="owl-carousel owl-theme">
        {{-- MAN --}}
        <div class="ms-2 me-2">
          <div class="card h-100">
            <a href="https://man1malang.sch.id/" target="_blank" class="text-decoration-none text-dark">
              <img src="assets/img/satker/MAN-1.png" alt="satker-img"
                class="img-fluid card-img-top rounded-circle shadow-sm ">
              <div class="card-body">
                <p class="card-text">MA Negeri 1 Malang</p>
              </div>
            </a>
          </div>
        </div>
        <div class="ms-2 me-2">
          <div class="card h-100">
            <a href="#" class="text-decoration-none text-dark">
              <img src="assets/img/satker/MAN-2.png" alt="satker-img"
                class="img-fluid card-img-top rounded-circle shadow-sm ">
              <div class="card-body">
                <p class="card-text">MA Negeri 2 Malang</p>
              </div>
            </a>
          </div>
        </div>
        <div class="ms-2 me-2">
          <div class="card h-100">
            <a href="https://man3malangsuryo.sch.id/" target="_blank" class="text-decoration-none text-dark">
              <img src="assets/img/satker/MAN-3.png" alt="satker-img"
                class="img-fluid card-img-top rounded-circle shadow-sm ">
              <div class="card-body">
                <p class="card-text">MA Negeri 3 Malang</p>
              </div>
            </a>
          </div>
        </div>
        {{-- MTs --}}
        <div class="ms-2 me-2">
          <div class="card h-100">
            <a href="https://mtsn1kabmalang.sch.id/" target="_blank" class="text-decoration-none text-dark">
              <img src="assets/img/satker/MTS-1.png" alt="satker-img"
                class="img-fluid card-img-top rounded-circle shadow-sm ">
              <div class="card-body">
                <p class="card-text">MTs Negeri 1 Malang</p>
              </div>
            </a>
          </div>
        </div>
        <div class="ms-2 me-2">
          <div class="card h-100">
            <a href="https://www.mtsn2malang.sch.id/" target="_blank" class="text-decoration-none text-dark">
              <img src="assets/img/satker/MTS-2.png" alt="satker-img"
                class="img-fluid card-img-top rounded-circle shadow-sm ">
              <div class="card-body">
                <p class="card-text">MTs Negeri 2 Malang</p>
              </div>
            </a>
          </div>
        </div>
        <div class="ms-2 me-2">
          <div class="card h-100">
            <a href="http://mtsn3malang.sch.id/" target="_blank" class="text-decoration-none text-dark">
              <img src="assets/img/satker/MTS-3.png" alt="satker-img"
                class="img-fluid card-img-top rounded-circle shadow-sm ">
              <div class="card-body">
                <p class="card-text">MTs Negeri 3 Malang</p>
              </div>
            </a>
          </div>
        </div>
        <div class="ms-2 me-2">
          <div class="card h-100">
            <a href="https://mtsn4malang.sch.id/" target="_blank" class="text-decoration-none text-dark">
              <img src="assets/img/satker/MTS-4.png" alt="satker-img"
                class="img-fluid card-img-top rounded-circle shadow-sm ">
              <div class="card-body">
                <p class="card-text">MTs Negeri 4 Malang</p>
              </div>
            </a>
          </div>
        </div>
        <div class="ms-2 me-2">
          <div class="card h-100">
            <a href="https://mtsn5malang.sch.id/" target="_blank" class="text-decoration-none text-dark">
              <img src="assets/img/satker/MTS-5.png" alt="satker-img"
                class="img-fluid card-img-top rounded-circle shadow-sm ">
              <div class="card-body">
                <p class="card-text">MTs Negeri 5 Malang</p>
              </div>
            </a>
          </div>
        </div>
        <div class="ms-2 me-2">
          <div class="card h-100">
            <a href="https://mtsn6malang.sch.id/" target="_blank" class="text-decoration-none text-dark">
              <img src="assets/img/satker/MTS-6.png" alt="satker-img"
                class="img-fluid card-img-top rounded-circle shadow-sm ">
              <div class="card-body">
                <p class="card-text">MTs Negeri 6 Malang</p>
              </div>
            </a>
          </div>
        </div>
        <div class="ms-2 me-2">
          <div class="card h-100">
            <a href="https://mtsn7malang.sch.id/" target="_blank" class="text-decoration-none text-dark">
              <img src="assets/img/satker/MTS-7.png" alt="satker-img"
                class="img-fluid card-img-top rounded-circle shadow-sm ">
              <div class="card-body">
                <p class="card-text">MTs Negeri 7 Malang</p>
              </div>
            </a>
          </div>
        </div>
        {{-- MIN --}}
        <div class="ms-2 me-2">
          <div class="card h-100">
            <a href="http://min1kabmalang.mysch.id/" target="_blank" class="text-decoration-none text-dark">
              <img src="assets/img/satker/MIN-1.png" alt="satker-img"
                class="img-fluid card-img-top rounded-circle shadow-sm ">
              <div class="card-body">
                <p class="card-text">MI Negeri 1 Malang</p>
              </div>
            </a>
          </div>
        </div>
        <div class="ms-2 me-2">
          <div class="card h-100">
            <a href="#" target="_blank" class="text-decoration-none text-dark">
              <img src="assets/img/satker/MIN-2.png" alt="satker-img"
                class="img-fluid card-img-top rounded-circle shadow-sm ">
              <div class="card-body">
                <p class="card-text">MI Negeri 2 Malang</p>
              </div>
            </a>
          </div>
        </div>
        <div class="ms-2 me-2">
          <div class="card h-100">
            <a href="http://www.min3malang.sch.id/" target="_blank" class="text-decoration-none text-dark">
              <img src="assets/img/satker/MIN-3.png" alt="satker-img"
                class="img-fluid card-img-top rounded-circle shadow-sm ">
              <div class="card-body">
                <p class="card-text">MI Negeri 3 Malang</p>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
{{-- Akhir Satker --}}

@endsection