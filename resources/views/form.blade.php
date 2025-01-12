<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Forms</title>
  <link rel="stylesheet" href="assets/styles/index.scss">
  <link rel="stylesheet" href="{{ asset('mycss/custom.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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

  @vite(['resources/assets/styles/index.scss', 'resources/assets/scripts/index.js'])
</head>

<body class="app">
  <!-- @TOC -->
  <!-- =================================================== -->
  <!--
      + @Page Loader
      + @App Content
          - #Left Sidebar
              > $Sidebar Header
              > $Sidebar Menu

          - #Main
              > $Topbar
              > $App Screen Content
    -->

  <!-- @Page Loader -->
  <!-- =================================================== -->
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

  <!-- @App Content -->

  <!-- =================================================== -->
  <div>
    <!-- #Left Sidebar ==================== -->
    <div class="sidebar">
      <div class="sidebar-inner">
        <!-- ### $Sidebar Header ### -->

        @include('partials.sidebar-header')

        <!-- ### $Sidebar Menu ### -->
        @include('partials.sidebar-menu')
      </div>
    </div>

    <!-- #Main ============================ -->
    <div class="page-container">
      <!-- ### $Topbar ### -->
      @include('partials.main-header')

      <!-- ### $App Screen Content ### -->



      <main class="main-content bgc-grey-100">
        <div id="mainContent">
          <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">@yield('name') - @yield('title')</h4>

            @include('partials.flash-messages')

            @yield('app-content')
          </div>
        </div>
        </main>







        <!-- ### $App Screen Footer ### -->
        <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
          <span>Copyright © 2024 Designed by <a href="https://colorlib.com" target="_blank" rel="nofollow noopener noreferrer" title="Colorlib">Colorlib</a>. All rights reserved.</span>
        </footer>
    </div>
</body>

</html>