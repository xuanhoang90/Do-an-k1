<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Forms</title>
  <link rel="stylesheet" href="{{ asset("assets/styles/index.scss") }}">
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

        @include('partials/sidebar-header')

        <!-- ### $Sidebar Menu ### -->
        @include('partials.sidebar-menu')
      </div>
    </div>

    <!-- #Main ============================ -->
    <div class="page-container">
      <!-- ### $Topbar ### -->
      @include('partials.main-header')

      <!-- ### $App Screen Content ### -->

     

      @yield('app-content')


      


      <div class="content">
        @include('partials.component-alert')
        @include('partials.component-toast')
        @yield('app-content')
      </div>

      <!-- ### $App Screen Footer ### -->
      <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
        <span>Copyright © 2024 Designed by <a href="https://colorlib.com" target="_blank" rel="nofollow noopener noreferrer" title="Colorlib">Colorlib</a>. All rights reserved.</span>
      </footer>
    </div>
  </div>
</body>

</html>