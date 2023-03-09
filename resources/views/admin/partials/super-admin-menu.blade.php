{{-- Profile Instansi --}}
<div>
  <ul class="navbar-nav ps-3">
    <li>
      <a href="/admin/artikel" class="nav-link @stack('kelola-profile-active') px-3">
        <span class="me-2">
          <i class="bi bi-person-lines-fill"></i>
        </span>
        <span>Profile Instansi</span>
      </a>
    </li>
  </ul>
</div>
{{-- Kelola Berita --}}
<div>
  <ul class="navbar-nav ps-3">
    <li>
      <a href="/admin/berita" class="nav-link @stack('kelola-berita-active') px-3">
        <span class="me-2">
          <i class="bi bi-newspaper"></i>
        </span>
        <span>Berita & Artikel</span>
      </a>
    </li>
  </ul>
</div>
{{-- Kelola Unit --}}
<div>
  <ul class="navbar-nav ps-3">
    <li>
      <a href="/admin/unit" class="nav-link @stack('kelola-unit-active') px-3">
        <span class="me-2">
          <i class="bi bi-newspaper"></i>
        </span>
        <span>Unit Kerja</span>
      </a>
    </li>
  </ul>
</div>
{{-- Zona Integritas --}}
<div>
  <ul class="navbar-nav ps-3">
    <li>
      <a href="/admin/zi" class="nav-link @stack('kelola-zi-active') px-3">
        <span class="me-2">
          <i class="bi bi-newspaper"></i>
        </span>
        <span>Zona Integritas</span>
      </a>
    </li>
  </ul>
</div>
{{-- Kelola Pengumuman --}}
<div>
  <ul class="navbar-nav ps-3">
    <li>
      <a href="/admin/pengumuman" class="nav-link @stack('kelola-pengumuman-active') px-3">
        <span class="me-2">
          <i class="bi bi-newspaper"></i>
        </span>
        <span>Pengumuman</span>
      </a>
    </li>
  </ul>
</div>
{{-- Kelola Header Slide --}}
<div>
  <ul class="navbar-nav ps-3">
    <li>
      <a href="/admin/header-slide" class="nav-link @stack('kelola-header-slide') px-3">
        <span class="me-2">
          <i class="bi bi-layout-split"></i>
        </span>
        <span>Header Slide</span>
      </a>
    </li>
  </ul>
</div>
{{-- Video Youtube --}}
<div>
  <ul class="navbar-nav ps-3">
    <li>
      <a href="/admin/video" class="nav-link @stack('kelola-video-active') px-3">
        <span class="me-2">
          <i class="bi bi-youtube"></i>
        </span>
        <span class="text-decoration-line-through">YouTube Video</span>
      </a>
    </li>
  </ul>
</div>
<li class="my-4">
  <hr class="dropdown-divider">
</li>
{{-- Layanan --}}
<li>
  <div class="text-muted small fw-bold text-uppercase @stack('layanan-active') px-3">Layanan</div>
</li>
<li>
  <a class="nav-link sidebar-link px-3" data-bs-toggle="collapse" href="#interfaceCollapse" role="button"
    aria-expanded="false" aria-controls="interfaceCollapse">
    <span class="me-2"><i class="bi bi-clipboard-check"></i></span>
    <span>Layanan</span>
    <span class="right-icon ms-auto"><i class="bi bi-chevron-down"></i></span>
  </a>
  <div class="collapse show" id="interfaceCollapse">
    <div>
      <ul class="navbar-nav ps-3">
        <li>
          <a href="/admin/layanan/haji" class="nav-link @stack('kelola-haji-active') px-3">
            <span class="me-2">
              <i class="bi bi-building"></i>
            </span>
            <span>Haji & Umrah</span>
          </a>
        </li>
      </ul>
    </div>
    <div>
      <ul class="navbar-nav ps-3">
        <li>
          <a href="/admin/layanan/pendidikan" class="nav-link @stack('kelola-pendidikan-active') px-3">
            <span class="me-2">
              <i class="bi bi-building"></i>
            </span>
            <span>Pendidikan</span>
          </a>
        </li>
      </ul>
    </div>
    <div>
      <ul class="navbar-nav ps-3">
        <li>
          <a href="/admin/layanan/kua" class="nav-link @stack('kelola-kua-active') px-3">
            <span class="me-2">
              <i class="bi bi-building"></i>
            </span>
            <span>KUA</span>
          </a>
        </li>
      </ul>
    </div>
    <div>
      <ul class="navbar-nav ps-3">
        <li>
          <a href="/admin/faq" class="nav-link @stack('kelola-faq-active') px-3">
            <span class="me-2">
              <i class="bi bi-question-circle"></i>
            </span>
            <span>FAQs</span>
          </a>
        </li>
      </ul>
    </div>
</li>