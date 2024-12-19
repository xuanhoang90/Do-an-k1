<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin | Caligraphy</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/assets/styles/index.scss', 'resources/assets/scripts/index.js'])
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/44.1.0/ckeditor5.css">
  </head>
  <body class="app">
    @include('admin.commons.loader')

    <div>
      @include('admin.commons.left-sidebar')

      <div class="page-container">
        @include('admin.commons.header')

        <main class='main-content bgc-grey-100'>
          <div id='mainContent'>
            @yield('content')
          </div>
        </main>

        @include('admin.commons.footer')
      </div>
    </div>
  </body>

  <script src="https://cdn.ckeditor.com/ckeditor5/44.1.0/ckeditor5.umd.js"></script>

  @yield('scripts')
</html>