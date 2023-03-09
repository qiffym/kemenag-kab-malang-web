{{-- Bagian Kanan Main --}}
<div class="col-lg-4">
  {{-- Waktu Solat --}}
  @include('partials.jadwal-sholat')
  {{-- Akhir Waktu Solat --}}

  {{-- Terpopuler --}}
  @php
  use App\Models\Post;
  $populars = Post::take(5)->orderBy('click', 'desc')->get();
  @endphp
  <section id="terpopuler">
    <div class="row">
      <div class="col-12">
        <h3 class="body-title bg-success fw-bold text-uppercase text-white py-2 ps-4"><i class="fas fa-award pe-1"></i>
          terpopuler</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-12 mb-4">
        @php
        use Illuminate\Support\Str;
        @endphp
        @foreach ($populars as $post)
        <a href="/read/{{ $post->slug }}" class="text-decoration-none text-dark">
          <div class="card mb-2">
            <div class="row g-0 align-items-center">
              <div class="col-md-4 p-0">
                <img src="{{ asset('') }}/assets/img/post/{{ $post->image_path }}"
                  class="bg-dark d-block img-fluid w-100 shadow-sm rounded" alt="{{ $post->title }}">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <p class="card-title fs-6 fw-bold">
                    {{ Str::limit($post->title, 50, '...') }}
                  </p>
                  <small
                    class="text-muted">{{ \Carbon\Carbon::parse($post->publish_at)->isoFormat('dddd, D MMMM Y') }}</small>
                </div>
              </div>
            </div>
        </a>
      </div>
      @endforeach
    </div>
</div>
</section>
{{-- Akhir Terpopuler --}}

{{-- Pengumuman --}}
@php
use App\Models\Announcement;
$posts = Announcement::where('status', true)->take(3)->latest()->get();
@endphp
<section id="pengumuman">
  <div class="row">
    <div class="col-12">
      <h3 class="body-title bg-success fw-bold text-uppercase text-white py-2 ps-4"><i class="fas fa-bullhorn pe-1"></i>
        pengumuman</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-12 mb-4">
      {{-- acordion pengumuman --}}
      @if ($posts->count())
      <div class="accordion" id="accordionPengumuman">
        @foreach ($posts as $post)
        <div class="accordion-item">
          <h2 class="accordion-header" id="{{ "headingId".$post->id }}">
            <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
              data-bs-target="{{ "#collapseId".$post->id }}" aria-expanded="true"
              aria-controls="{{ "collapseId".$post->id }}">
              {{ $post->title }}
            </button>
          </h2>
          <div id="{{ "collapseId".$post->id }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
            aria-labelledby="{{ "headingId".$post->id }}" data-bs-parent="#accordionPengumuman">
            <div class="accordion-body">
              {!! \Illuminate\Support\Str::limit($post->body, 200, '...') !!}
              <br>
              <a name="" id="" class="btn btn-sm btn-success" href="/pengumuman/read/{{ $post->slug }}"
                role="button">buka
                pengumuman</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      @else
      <div class="alert alert-success" role="alert">
        <strong>Tidak ada pengumuman</strong>
      </div>
      @endif
    </div>
  </div>
</section>
{{-- Akhir Pengumuman --}}

{{-- Cek Porsi Haji --}}
<section id="cek-porsi-haji">
  <div class="row mb-0">
    <div class="col-12 mb-0">
      <h3 class="body-title bg-success fw-bold text-uppercase text-white py-2 ps-4 mb-0"><i
          class="fas fa-users pe-1"></i> cek porsi haji</h3>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col-12">
      <a href="https://haji.kemenag.go.id/v4/" target="_blank">
        <img src="{{ asset('') }}/assets/img/cek-porsi-haji.png" alt="img-cek-porsi-haji" class="w-100">
      </a>
    </div>
  </div>
</section>
{{-- Akhir Cek Porsi Haji --}}

{{-- Info Grafis --}}
{{-- <section id="info-grafis">
  <div class="row">
    <div class="col-12">
      <h3 class="body-title bg-success fw-bold text-uppercase text-white py-2 ps-4"><i
          class="fas fa-info-circle pe-1"></i> infografis</h3>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col-12">
      <div class="card h-100">
        <a class="bg-dark" href="#"><img src="" alt="" class="card-img-top"></a>
      </div>
    </div>
  </div>
</section> --}}
{{-- Akhir Info Grafis --}}

</div>
{{-- Akhir Bagian Kanan Main --}}