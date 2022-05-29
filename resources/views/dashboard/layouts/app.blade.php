<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>

  <!-- General CSS Files -->
  @include('dashboard.includes.style')

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href={{ asset("assets/css/style.css") }}>
  <link rel="stylesheet" href={{ asset("assets/css/components.css") }}>
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      @include('dashboard.components.navbar')

      @include('dashboard.components.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
      @include('dashboard.components.footer')
    </div>
  </div>

  <!-- General JS Scripts -->
  @include('dashboard.includes.script')

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src={{ asset("assets/js/scripts.js") }}></script>
  <script src={{ asset("assets/js/custom.js") }}></script>

  <!-- Page Specific JS File -->
</body>

</html>