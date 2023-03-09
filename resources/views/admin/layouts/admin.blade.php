<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('') }}/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('') }}/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="{{ asset('') }}/css/jquery.datetimepicker.min.css">
  <title>Admin | {{ $title }}</title>

  {{-- My CSS --}}
  <link rel="stylesheet" href="{{ asset('') }}/css/admin-style.css">
</head>

<body>
  {{-- navbar --}}
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      {{-- offcanvar trigger --}}
      <button class="navbar-toggler me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
        aria-controls="offcanvasExample">
        <span class="navbar-toggler-icon" data-bs-target="#offcanvasExample"></span>
      </button>
      {{-- akhir offcanvar trigger --}}
      <a class="navbar-brand me-auto text-uppercase fw-bold" href="/admin"><img
          src="{{ asset('') }}/assets/img/nav-logo.png" alt="nav-logo" width="250"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              <span class="fs-5">{{ Auth::user()->name }} </span><i class="bi bi-person-fill fs-3"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/admin/profile/{{ Auth::user()->id }}"><i
                    class="bi bi-person-circle"></i> My Profile</a></li>
              @if (Auth::user()->role_id == 1)
              <li><a class="dropdown-item" href="/admin/admin-control-panel"><i class="bi bi-gear-fill"></i> Admin
                  Control Panel</a></li>
              @endif
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <a class="dropdown-item fw-bold bg-danger text-light" href="{{ route('logout') }}" onclick="
                event.preventDefault();
                document.getElementById('formLogout').submit();">
                  <i class="bi bi-power fs-5"></i> LOGOUT</a>
                <form action="{{ route('logout') }}" id="formLogout" method="POST">@csrf</form>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  {{-- akhir navbar --}}

  {{-- offcanvas --}}
  <div class="offcanvas mt-2 bg-dark text-light offcanvas-start sidebar-nav" tabindex="-1" id="offcanvasExample"
    aria-labelledby="offcanvasExampleLabel">

    <div class="offcanvas-body py-4 px-0">
      <nav class="navbar-dark">
        <ul class="navbar-nav">
          <li>
            <div class="text-muted small fw-bold text-uppercase px-3">core</div>
          </li>
          <li>
            <a href="/admin" class="nav-link px-3 active">
              <span class="me-2">
                <i class="bi bi-speedometer2"></i>
              </span>
              <span>Dashboard</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/') }}" class="nav-link px-3">
              <span class="me-2">
                <i class="bi bi-house-door"></i>
              </span>
              <span>Public Area</span>
            </a>
          </li>
          <li class="my-4">
            <hr class="dropdown-divider">
          </li>
          {{-- Content --}}
          <li>
            <div class="text-muted small fw-bold text-uppercase px-3">Content</div>
          </li>
          <li>
            <a class="nav-link @stack('content-active') sidebar-link px-3" data-bs-toggle="collapse"
              href="#contentCollapse" role="button" aria-expanded="false" aria-controls="contentCollapse">
              <span class="me-2"><i class="bi bi-newspaper"></i></span>
              <span>Content</span>
              <span class="right-icon ms-auto"><i class="bi bi-chevron-down"></i></span>
            </a>
            <div class="collapse show" id="contentCollapse">
              {{-- Menu untuk Role Super Admin --}}
              @if (Auth::user()->role_id == 1)
              @include('admin.partials.super-admin-menu')
              @else
              {{-- Menu untuk Role Kontributor --}}
              @include('admin.partials.kontributor-menu')

              @endif
            </div>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  {{-- akhir offcanvas --}}

  {{-- main --}}
  <main class="mt-5 pt-3">
    <div class="container-fluid" style="padding: 3% 5% 0">
      @yield('admin-layout')

    </div>
    <!-- footer -->
    <section class="container" style="font-size: 0.8em; padding:7% 0">
      <div class="row align-items-end justify-content-between">
        <!-- Left -->
        <div class="col-5">
          <span>Copyright © 2021 All Rights Reserved | Kemenag Kabupaten Malang</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div class="col-5 text-end">
          <span class="fw-bold">
            Design with <i class="bi bi-heart-fill text-danger"></i> By: Qiff Ya Muhammad
          </span>
        </div>
        <!-- Right -->
      </div>
    </section>
    <!-- footer -->
  </main>
  {{-- akhir main --}}
  <script src="{{ asset('') }}/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('') }}/js/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="{{ asset('') }}/js/jquery.dataTables.min.js"></script>
  <script src="{{ asset('') }}/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.tiny.cloud/1/eu6g6qir2kxi2cd2kyprf0dixev0nm1faq1kv6law6f0xii8/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>
  <script src="{{ asset('') }}/js/jquery.datetimepicker.full.min.js"></script>
  <script src="{{ asset('') }}/js/admin-script.js"></script>
  @stack('editor')
  @stack('date')
  @stack('deleteAdmin')
  @stack('deleteBerita')
  @stack('deleteArtikel')
  @stack('deleteHeaderSlide')
  @stack('deleteFAQ')
  @stack('deleteLayananPendidikan')
  @stack('deleteLayananHaji')
  @stack('deleteLayananKUA')
  @stack('deletePengumuman')
  @stack('deleteZi')
</body>

</html>