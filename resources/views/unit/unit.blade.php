@extends('layouts.main')
@push('unit-active', 'active bg-success rounded')
@section('main-layout')
<section id="unit-section">
  {{ Breadcrumbs::render('unit') }}
  <div class="row justify-content-between">
    <div class="col-md-5 pt-3">
      <h3 class="fw-bold">INFORMASI UNIT KERJA</h3>
      @if (!is_null(request('category')))
      <h4>{{ $subtitle }}</h4>
      @endif
    </div>
    {{-- <div class="col-md-5 pt-3 d-none">
      <form action="/unit" method="get">
        @if (request('category'))
        <input type="hidden" name="category" value="{{ request('category') }}">
    @endif
    <div class="input-group mb-3">
      <input type="text" name="search" class="form-control" placeholder="Cari Info..." aria-label="Search"
        aria-describedby="button-addon2" value="{{ request('search') }}">
      <button class="btn btn-outline-success" type="submit" id="button-addon2">
        <i class="fa fa-search"></i>
      </button>
    </div>
    </form>
  </div> --}}
  </div>

  {{-- Struktur Organisasi Unit Kerja --}}

  @if (request('category') == 'bimas-islam')
  <hr>
  <div class="row mt-4">
    <div class="col-12 text-center">
      <img class="bg-dark rounded img-fluid shadow so-item"
        src="{{ asset("assets/img/unit/".$structures[1]->image_path ) }}" alt="">
    </div>
  </div>
  @elseif (request('category') == 'pendma')
  <div class="row mt-4">
    <div class="col-12 text-center">
      <img class="bg-dark rounded img-fluid shadow so-item"
        src="{{ asset("assets/img/unit/".$structures[2]->image_path ) }}" alt="">
    </div>
  </div>
  @elseif (request('category') == 'pais')
  <div class="row mt-4">
    <div class="col-12 text-center">
      <img class="bg-dark rounded img-fluid shadow so-item"
        src="{{ asset("assets/img/unit/".$structures[4]->image_path ) }}" alt="">
    </div>
  </div>
  @elseif (request('category') == 'phu')
  <div class="row mt-4">
    <div class="col-12 text-center">
      <img class="bg-dark rounded img-fluid shadow so-item"
        src="{{ asset("assets/img/unit/".$structures[0]->image_path ) }}" alt="">
    </div>
  </div>
  @elseif (request('category') == 'pd-pontren')
  <div class="row mt-4">
    <div class="col-12 text-center">
      <img class="bg-dark rounded img-fluid shadow so-item"
        src="{{ asset("assets/img/unit/".$structures[3]->image_path ) }}" alt="">
    </div>
  </div>
  @elseif (request('category') == 'penyelenggara-syariah')
  <div class="row mt-4">
    <div class="col-12 text-center">
      <img class="bg-dark rounded img-fluid shadow so-item"
        src="{{ asset("assets/img/unit/".$structures[5]->image_path ) }}" alt="">
    </div>
  </div>
  @elseif (request('category') == 'penyelenggara-kristen')
  <div class="row mt-4">
    <div class="col-12 text-center">
      <img class="bg-dark rounded img-fluid shadow so-item"
        src="{{ asset("assets/img/unit/".$structures[6]->image_path ) }}" alt="">
    </div>
  </div>
  @elseif (request('category') == 'penyelenggara-katolik')
  <div class="row mt-4">
    <div class="col-12 text-center">
      <img class="bg-dark rounded img-fluid shadow so-item"
        src="{{ asset("assets/img/unit/".$structures[7]->image_path ) }}" alt="">
    </div>
  </div>
  @elseif (request('category') == 'penyelenggara-hindu')
  <div class="row mt-4">
    <div class="col-12 text-center">
      <img class="bg-dark rounded img-fluid shadow so-item"
        src="{{ asset("assets/img/unit/".$structures[8]->image_path ) }}" alt="">
    </div>
  </div>
  @elseif (request('category') == 'urusan-umum')
  <div class="row mt-4">
    <div class="col-12 text-center">
      <img class="bg-dark rounded img-fluid shadow so-item"
        src="{{ asset("assets/img/unit/".$structures[9]->image_path ) }}" alt="">
    </div>
  </div>
  @elseif (request('category') == 'urusan-kepegawaian')
  <div class="row mt-4">
    <div class="col-12 text-center">
      <img class="bg-dark rounded img-fluid shadow so-item"
        src="{{ asset("assets/img/unit/".$structures[10]->image_path ) }}" alt="">
    </div>
  </div>
  @elseif (request('category') == 'urusan-keuangan')
  <div class="row mt-4">
    <div class="col-12 text-center">
      <img class="bg-dark rounded img-fluid shadow so-item"
        src="{{ asset("assets/img/unit/".$structures[11]->image_path ) }}" alt="">
    </div>
  </div>

  @else
  @endif

  <hr>
  <!-- Modal Image -->
  <div class="modal fade" id="so-images" tabindex="-1" aria-labelledby="so-imageLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img src="" class="modal-image" style="max-width: 100%; width: 100%" alt="">
        </div>
      </div>
    </div>
  </div>


  @if ($units->count())
  {{-- Pencarian --}}
  <div class="row">
    <div class="col-md-6 pt-3">
      <form action="/unit" method="get">
        @if (request('category'))
        <input type="hidden" name="category" value="{{ request('category') }}">
        @endif
        <div class="input-group mb-3">
          <input type="text" name="search" class="form-control" placeholder="Cari Info..." aria-label="Search"
            aria-describedby="button-addon2" value="{{ request('search') }}">
          <button class="btn btn-outline-success" type="submit" id="button-addon2">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </form>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-12">
      <div class="col-12 mb-2">
        <div class="row row-cols-1 row-cols-md-3 g-2">
          @foreach ($units as $unit)
          <div class="col">
            <div class="card h-100">
              <img src="{{ asset("assets/img/unit/$unit->image_path") }}" class="card-img-top bg-dark" alt="...">
              <div class="card-body">
                <h5 class="card-title fw-bold">{{ $unit->title }}</h5>
                <div class="mb-2">
                  <span class="author"><small class="text-muted"><i class="fas fa-user fa-xs"></i>
                      {{ $unit->author->name }} </small>
                  </span> <br>
                  <span class="category">
                    <small><i class="fas fa-bookmark fa-xs text-muted"></i>
                      <a class="text-decoration-none text-success"
                        href="/unit?category={{ $unit->unit_category->slug }}">{{ $unit->unit_category->name }}
                      </a>
                    </small>
                  </span>
                </div>
                <p class="card-text">
                  {{ ($unit->excerpt != null) ? $unit->excerpt : \Illuminate\Support\Str::limit($unit->body, 200, '...') }}
                </p>
              </div>
              <div class="card-footer d-flex justify-content-between">
                <small class="text-muted">{{ \Carbon\Carbon::parse($unit->publish_at)->diffForHumans() }}</small>
                <a name="readMore" id="readMore" class="btn btn-sm btn-success btn-sm rounded"
                  href="/unit/read/{{ $unit->slug }}" role="button">read more..</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        {{-- pagination --}}
        <section id="pagination">
          <div class="d-flex justify-content-center mt-5">
            @if(request('category') and request('search'))
            {!! $units->appends(['category' => request('category'),'search' => request('search')])->links() !!}
            @elseif (request('category'))
            {!! $units->appends(['category' => request('category')])->links() !!}
            @elseif(request('search'))
            {!! $units->appends(['search' => request('search')])->links() !!}
            @else
            {!! $units->links() !!}
            @endif
          </div>
        </section>
        {{-- pagination --}}
      </div>
      {{-- Card Berita --}}
    </div>
  </div>
  @else
  Berita Kosong
  @endif

</section>
@endsection