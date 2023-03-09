<nav class="navbar fixed-top navbar-expand-lg navbar-dark navbar-toggleable-md border-bottom">
  <div class="container">
    <a class="navbar-brand" href="/">
      <img class="py-1" src="{{ asset('') }}/assets/img/nav-logo.png" alt="nav-logo" width="60px">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon fs-5 fs-md-3"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto fw-bold text-center">
        {{-- Home --}}
        <li class="nav-item">
          <a class="nav-link  {{ ($title === "Home") ? 'active bg-success rounded' : '' }}" aria-current="page"
            href="/"><i class="fas fa-home"></i> Home</a>
        </li>

        {{-- Admin --}}
        @if (Auth::id() != null)
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/admin">Admin</a>
        </li>
        @endif

        {{-- Profile --}}
        <li class="nav-item dropdown">
          <a class="nav-link @stack('profile-active') dropdown-toggle" href="#" id="navbarDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            Profile
          </a>
          <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown">
            @php
            use App\Models\Article;
            $articles = Article::all('title', 'slug');
            @endphp
            <li>
              <hr class="dropdown-divider text-white">
            </li>
            @foreach ($articles as $article)
            <li><a class="dropdown-item"
                href="/artikel/{{ $article->slug }}">{{ ($article->slug == 'visi-dan-misi-kantor-kementerian-agama-kabupaten-malang' ? 'Visi dan Misi' : $article->title) }}</a>
            </li>
            <hr class="dropdown-divider text-white">
            @endforeach
          </ul>
        </li>
        {{-- Berita --}}
        <li class="nav-item">
          <a class="nav-link  {{ ($title === "Berita") ? 'active bg-success rounded' : '' }}" href="/berita">Berita</a>
        </li>
        {{-- Unit Kerja --}}
        <li class="nav-item dropdown dropunit">
          <a class="nav-link @stack('unit-active') dropdown-toggle" href="#" id="navbarDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            Unit Kerja
          </a>
          <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown">
            <li>
              <hr class="dropdown-divider text-white">
            </li>
            <li>
              <a class="dropdown-item @stack('active') subtatausaha" href="#">Subbag Tata Usaha <span class="float-end">
                  &raquo;
                </span></a>
              <ul class="submenu dropdown-menu">
                <li><a class="dropdown-item" href="/unit?category=urusan-umum">Urusan Umum</a></li>
                <hr class="dropdown-divider text-white">
                <li><a class="dropdown-item" href="/unit?category=urusan-kepegawaian">Urusan Kepegawaian</a></li>
                <hr class="dropdown-divider text-white">
                <li><a class="dropdown-item" href="/unit?category=urusan-keuangan">Urusan Keuangan</a></li>
              </ul>
            </li>
            <hr class="dropdown-divider text-white">
            <li><a class="dropdown-item @stack('active') text-wrap" style="width: 13rem;"
                href="/unit?category=bimas-islam">Seksi Bimas
                Islam</a></li>
            <hr class="dropdown-divider text-white">
            <li><a class="dropdown-item @stack('active') text-wrap" style="width: 13rem;"
                href="/unit?category=pendma">Seksi Pendidikan
                Madrasah</a>
            </li>
            <hr class="dropdown-divider text-white">
            <li><a class="dropdown-item @stack('active') text-wrap" style="width: 13rem;"
                href="/unit?category=pais">Seksi Pendidikan Agama
                Islam</a>
            </li>
            <hr class="dropdown-divider text-white">
            <li><a class="dropdown-item @stack('active') text-wrap" style="width: 13rem;"
                href="/unit?category=phu">Seksi
                Penyelenggara Haji
                &
                Umrah</a>
            </li>
            <hr class="dropdown-divider text-white">
            <li><a class="dropdown-item @stack('active') text-wrap" style="width: 13rem;"
                href="/unit?category=pd-pontren">Seksi Pendidikan
                Diniyah & Pontren</a></li>
            <hr class="dropdown-divider text-white">
            <li><a class="dropdown-item @stack('active') text-wrap" style="width: 13rem;"
                href="/unit?category=penyelenggara-syariah">Penyelenggara
                Syariah</a></li>
            <hr class="dropdown-divider text-white">
            <li><a class="dropdown-item @stack('active') text-wrap" style="width: 13rem;"
                href="/unit?category=penyelenggara-kristen">Penyelenggara
                Kristen</a></li>
            <hr class="dropdown-divider text-white">
            <li><a class="dropdown-item @stack('active') text-wrap" style="width: 13rem;"
                href="/unit?category=penyelenggara-katolik">Penyelenggara
                Katolik</a></li>
            <hr class="dropdown-divider text-white">
            <li><a class="dropdown-item @stack('active') text-wrap" style="width: 13rem;"
                href="/unit?category=penyelenggara-hindu">Penyelenggara
                Hindu</a></li>
          </ul>
        </li>
        {{-- Zone Integritas --}}
        <li class="nav-item dropdown">
          <a class="nav-link @stack('zi-active') dropdown-toggle" href="#" id="navbarDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            Zona Integritas
          </a>
          <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown">
            <li>
              <hr class="dropdown-divider text-white">
            </li>
            <li><a class="dropdown-item @stack('foto-active')" href="/zi?category=area-i">Area I</a></li>
            <hr class="dropdown-divider text-white">
            <li><a class="dropdown-item @stack('video-active')" href="/zi?category=area-ii">Area II</a></li>
            <hr class="dropdown-divider text-white">
            <li><a class="dropdown-item @stack('video-active')" href="/zi?category=area-iii">Area III</a></li>
            <hr class="dropdown-divider text-white">
            <li><a class="dropdown-item @stack('video-active')" href="/zi?category=area-iv">Area IV</a></li>
            <hr class="dropdown-divider text-white">
            <li><a class="dropdown-item @stack('video-active')" href="/zi?category=area-v">Area V</a></li>
            <hr class="dropdown-divider text-white">
            <li><a class="dropdown-item @stack('video-active')" href="/zi?category=area-vi">Area VI</a></li>
          </ul>
        </li>
        {{-- Gallery --}}
        {{-- <li class="nav-item dropdown">
          <a class="nav-link @stack('galeri-active') dropdown-toggle" href="#" id="navbarDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            Galeri
          </a>
          <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown">
            <li>
              <hr class="dropdown-divider text-white">
            </li>
            <li><a class="dropdown-item @stack('foto-active')" href="/foto">Foto Peristiwa</a></li>
            <li><a class="dropdown-item @stack('video-active')" href="/video">Video</a></li>
          </ul>
        </li> --}}

        {{-- FAQs --}}
        <li class="nav-item">
          <a class="nav-link  @stack('faq-active')" href="/faq">FAQs</a>
        </li>
        {{-- Kotak Pengaduan --}}
        <li class="nav-item dropdown">
          <a class="nav-link @stack('pengaduan-active') dropdown-toggle" href="#" id="navbarDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            Kotak Pengaduan
          </a>
          <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown">
            <li>
              <hr class="dropdown-divider text-white">
            </li>
            <li><a class="dropdown-item @stack('pengaduan')" href="/pengaduan">Pengaduan Masyarakat</a></li>
            <hr class="dropdown-divider text-white">
            <li><a class="dropdown-item @stack('pengaduanIntern')" href="/pengaduan-intern">Pengaduan Internal (WBS)</a>
            </li>
          </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>