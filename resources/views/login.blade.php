<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sigin</title>
  {{-- <link rel="stylesheet" href="{{ asset("assets/styles/index.scss") }}"> --}}
  <script src="{{ asset('myjs/custom.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('mycss/custom.css') }}">
  <style>
    #loader {
      transition: all 0.3s ease-in-out;
      opacity: 1;
      visibility: visible;
      position: fixed;
      height: 100vh;
      width: 100%;
      background: #fff;
      z-index: 90000;
    }

    #loader.fadeOut {
      opacity: 0;
      visibility: hidden;
    }



    .spinner {
      width: 40px;
      height: 40px;
      position: absolute;
      top: calc(50% - 20px);
      left: calc(50% - 20px);
      background-color: #333;
      border-radius: 100%;
      -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
      animation: sk-scaleout 1.0s infinite ease-in-out;
    }

    @-webkit-keyframes sk-scaleout {
      0% {
        -webkit-transform: scale(0)
      }

      100% {
        -webkit-transform: scale(1.0);
        opacity: 0;
      }
    }

    @keyframes sk-scaleout {
      0% {
        -webkit-transform: scale(0);
        transform: scale(0);
      }

      100% {
        -webkit-transform: scale(1.0);
        transform: scale(1.0);
        opacity: 0;
      }
    }
  </style>

  <style>
    body {
      background-image: url('https://thuthuatnhanh.com/wp-content/uploads/2021/12/Anh-nen-4K-phong-canh-thien-nhien-dep.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      min-height: 100vh;
    }
  </style>

  @vite(['resources/assets/styles/index.scss', 'resources/assets/scripts/index.js'])
</head>
  <body class="app d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: #f8f9fa;">
    <div id='loader'>
      <div class="spinner"></div>
    </div>

    <script>
      window.addEventListener('load', function load() {
        const loader = document.getElementById('loader');
        setTimeout(function() {
          loader.classList.add('fadeOut');
        }, 300);
      });
    </script>
    <div class="card shadow-sm" style="width: 100%; max-width: 400px;">
      @if ($errors->has('login_error'))
        <div class="alert alert-danger alert-dismissible">
          <h5>Error</h5>
          <p>{{ $errors->first('login_error') }}</p>
        </div>
      @endif
      <div class="card-body">
        <h4 class="card-title text-center mb-4">Login</h4>
        <form action="{{route('login')}}" method="post">
          @csrf
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="email" id="username" name="email" class="form-control" placeholder="Enter username..." required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required>
          </div>
          <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="form-check">
              <input type="checkbox" id="rememberMe" class="form-check-input">
              <label for="rememberMe" class="form-check-label">Remember Me</label>
            </div>
            <a href="#" class="text-decoration-none">Forgot Password?</a>
          </div>
          <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
      </div>
    </div>
  </body>
</html>
