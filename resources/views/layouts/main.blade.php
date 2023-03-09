<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Font Awesome 5 -->
  <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <!-- Owl Carousel -->
  <link rel="stylesheet" href="{{ asset('') }}/css/owl.carousel.min.css">
  <link rel="stylesheet" href="{{ asset('') }}/css/owl.theme.default.min.css">
  <!-- My CSS -->
  <link rel="stylesheet" href="{{ asset('') }}/css/style.css">


  <title>{{ $title }} | Kemenag Kabupaten Malang</title>
</head>

<body>
  @include('partials.navbar')

  @stack('header-section')

  <section id="main-section">
    <div class="container mt-4">
      <div class="row main-row">
        <div class="col-lg-8">
          @yield('main-layout')
        </div>

        @include('partials.sisi-kanan')
      </div>
    </div>
  </section>

  @include('partials.footer')
  <script src="{{ asset('fontawesome/js/all.min.js') }}"></script>
  <script src="{{ asset('') }}/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('') }}/js/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('') }}/js/owl.carousel.min.js"></script>

  <script src="{{ asset('') }}/js/script.js"></script>
</body>

</html>