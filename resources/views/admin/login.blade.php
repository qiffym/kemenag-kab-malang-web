<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('') }}login/vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('') }}login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('') }}login/vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('') }}login/vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('') }}login/vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('') }}login/css/util.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('') }}login/css/main.css">
  <!--===============================================================================================-->
</head>

<body>

  <div class="limiter">
    <div class="container-login100">

      <div class="wrap-login100">
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
          <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
              d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
          </symbol>
        </svg>
        {{-- Informasi --}}
        @if (session()->has('message'))
        <div class="col-12 text-center">
          <div class="alert alert-primary d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
              <use xlink:href="#info-fill" /></svg>
            <div>
              {{ session()->get('message') }}
            </div>
          </div>
        </div>

        @endif
        <div class="login100-pic js-tilt" data-tilt>
          <img src="{{ asset('') }}assets/img/logo-kemenag.svg" alt="IMG">
        </div>

        <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
          @csrf
          <span class="login100-form-title">
            Admin Login
          </span>


          <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
            <input class="input100  " type="text" name="email" placeholder="Email" autofocus>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>


          <div class="wrap-input100 validate-input" data-validate="Password is required">
            <input class="input100 " type="password" name="password" placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>

          @if ($errors->any())
          <div class="col-12">
            <ul class="d-inline-block">
              @foreach ($errors->all() as $error)
              <li class="mb-2 text-white bg-danger rounded p-2">
                {{ $error }}
              </li>
              @endforeach
            </ul>
          </div>
          @endif

          <div class="container-login100-form-btn">
            <button type="submit" name="submit" class="login100-form-btn">
              Login
            </button>
          </div>

          <div class="text-center p-t-12">
            <span class="txt1">
              Forgot
            </span>
            <a class="txt2" href="#">
              Username / Password?
            </a>
          </div>

          <div class="text-center p-t-136">
            <a class="txt2" href="/">
              <i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"> </i>
              Kembali Ke Home
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>




  <!--===============================================================================================-->
  <script src="{{ asset('') }}login/vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="{{ asset('') }}login/vendor/bootstrap/js/popper.js"></script>
  <script src="{{ asset('') }}login/vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="{{ asset('') }}login/vendor/select2/select2.min.js"></script>
  <!--===============================================================================================-->
  <script src="{{ asset('') }}login/vendor/tilt/tilt.jquery.min.js"></script>
  <script>
    $('.js-tilt').tilt({
			scale: 1.1
		})
  </script>
  <!--===============================================================================================-->
  <script src="{{ asset('') }}login/js/main.js"></script>

</body>

</html>