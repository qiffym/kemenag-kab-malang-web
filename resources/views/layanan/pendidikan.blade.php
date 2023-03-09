@extends('layouts.submain')

@section('submain-layout')


<div class="row mb-4">
  <div class="display-3 text-center">
    Pendidikan
    <hr class="dropdown-divider">
  </div>
</div>
<div class="row row-cols-1 g-3 row-cols-md-2 g-md-3 row-cols-lg-3 g-lg-4 justify-content-center">
  {{-- Pendidikan Madrasah --}}
  <div class="col">
    <div class="card bg-dark text-white">
      <a href="/layanan?category=pendma" class="text-decoration-none text-white">
        <img src="{{ asset('assets/icon/layanan/pendma.jpg') }}" class="card-img"
          style="height: 500px; object-fit: fill" alt="gambar">
        <div class="card-img-overlay d-flex align-items-center p-0">
          <h5 class="card-title fs-3 flex-fill text-center p-4" style="background-color: rgba(0, 0, 0, 0.7)">
            Pendidikan Madrasah
          </h5>
        </div>
      </a>
      <div class="card-footer text-center">
        <small>
          <a href="https://www.freepik.com/vectors/islamic" target="_blank" class="text-white">Islamic vector created by
            brgfx -
            www.freepik.com</a>
        </small>
      </div>
    </div>

  </div>
  {{-- Pendidikan Agama Islam --}}
  <div class="col">
    <div class="card bg-dark text-white">
      <a href="/layanan?category=pais" class="text-decoration-none text-white">
        <img src="{{ asset('assets/icon/layanan/pais.jpg') }}" class="card-img" style="height: 500px; object-fit: fill"
          alt="gambar">
        <div class="card-img-overlay d-flex align-items-center p-0">
          <h5 class="card-title fs-3 flex-fill text-center p-4" style="background-color: rgba(0, 0, 0, 0.7)">
            Pendidikan Agama Islam
          </h5>
        </div>
      </a>
      <div class="card-footer text-center">
        <small>
          <a href="https://www.freepik.com/vectors/book" target="_blank" class="text-white">Book
            vector created
            by brgfx - www.freepik.com</a>
        </small>
      </div>
    </div>

  </div>

  {{-- Pondok Pesantren --}}
  <div class="col">
    <div class="card bg-dark text-white">
      <a href="/layanan?category=pontren" class="text-decoration-none text-white">
        <img src="{{ asset('assets/icon/layanan/pontren.jpg') }}" class="card-img"
          style="height: 500px; object-fit: fill" alt="gambar">
        <div class="card-img-overlay d-flex align-items-center p-0">
          <h5 class="card-title fs-3 flex-fill text-center p-4" style="background-color: rgba(0, 0, 0, 0.7)">
            Pondok Pesantren
          </h5>
        </div>
      </a>
      <div class="card-footer text-center">
        <small>
          <a href="https://www.freepik.com/vectors/logo" target="_blank" class="text-white">Logo vector created
            by
            catalyststuff - www.freepik.com</a>
        </small>
      </div>
    </div>
  </div>
  {{--Pendidikan Agama Kristen  --}}
  <div class="col">
    <div class="card bg-dark text-white">
      <a href="/layanan?category=pakri" class="text-decoration-none text-white">
        <img src="{{ asset('assets/icon/layanan/pakri.jpg') }}" class="card-img "
          style="height: 500px; object-fit: fill" alt="gambar">
        <div class="card-img-overlay d-flex align-items-center p-0">
          <h5 class="card-title fs-3 flex-fill text-center p-4" style="background-color: rgba(0, 0, 0, 0.7)">
            Pendidikan Agama Kristen
          </h5>
        </div>
      </a>
      <div class="card-footer text-center">
        <small>
          <a href="https://www.freepik.com/vectors/background" target="_blank" class="text-white">Background vector
            created by brgfx -
            www.freepik.com</a>
        </small>
      </div>
    </div>
  </div>
  {{-- Pendidikan Agama Katolik --}}
  <div class="col">
    <div class="card bg-dark text-white">
      <a href="/layanan?category=pakat" class="text-decoration-none text-white">
        <img src="{{ asset('assets/icon/layanan/pakat.jpg') }}" class="card-img" style="height: 500px; object-fit: fill"
          alt="gambar">
        <div class="card-img-overlay d-flex align-items-center p-0">
          <h5 class="card-title fs-3 flex-fill text-center p-4" style="background-color: rgba(0, 0, 0, 0.7)">
            Pendidikan Agama Katolik
          </h5>
        </div>
      </a>
      <div class="card-footer text-center">
        <small>
          <a href="https://www.freepik.com/vectors/background" target="_blank" class="text-white">Background vector
            created by brgfx -
            www.freepik.com</a>
        </small>
      </div>
    </div>
  </div>
  {{-- Pendidikan Agama Hindu --}}
  <div class="col">
    <div class="card bg-dark text-white">
      <a href="/layanan?category=pahin" class="text-decoration-none text-white">
        <img src="{{ asset('assets/icon/layanan/pahin.jpg') }}" class="card-img "
          style="height: 500px; object-fit: fill" alt="gambar">
        <div class="card-img-overlay d-flex align-items-center p-0">
          <h5 class="card-title fs-3 flex-fill text-center p-4" style="background-color: rgba(0, 0, 0, 0.7)">
            Pendidikan Agama Hindu
          </h5>
        </div>
      </a>
      <div class="card-footer text-center">
        <small>
          <a href="https://www.freepik.com/vectors/hand-drawn" target="_blank" class="text-white">Hand drawn vector
            created by freepik - www.freepik.com</a>
        </small>
      </div>
    </div>
  </div>
  {{-- Pendidikan Agama Buddha --}}
  <div class="col">
    <div class="card bg-dark text-white">
      <a href="/layanan?category=pabud" class="text-decoration-none text-white">
        <img src="{{ asset('assets/icon/layanan/pabud.jpg') }}" class="card-img "
          style="height: 500px; object-fit: fill" alt="gambar">
        <div class="card-img-overlay d-flex align-items-center p-0">
          <h5 class="card-title fs-3 flex-fill text-center p-4" style="background-color: rgba(0, 0, 0, 0.7)">
            Pendidikan Agama Buddha
          </h5>
        </div>
      </a>
      <div class="card-footer text-center">
        <small>
          <a href="https://www.freepik.com/vectors/background" target="_blank" class="text-white">Background
            vector
            created by freepik - www.freepik.com</a>
        </small>
      </div>
    </div>
  </div>

</div>


@endsection