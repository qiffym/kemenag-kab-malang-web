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

  <!-- My CSS -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  @stack('style-bg')

  <title>{{ $title }} | Kemenag Kabupaten Malang</title>
</head>

<body class="overlay1 position-absolute d-flex flex-column min-vh-100">
  @include('partials.navbar')

  <div class="container py-4" style="margin: 7% auto">
    @yield('submain-layout')
  </div>

  @include('partials.footer')
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('js/script.js') }}"></script>
  @stack('infoLayanan')
</body>

</html>