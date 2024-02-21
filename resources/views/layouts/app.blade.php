
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('template_assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('template_assets/img/favicon.ico') }}">
  <title>Panel de Control | @yield('title')</title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('template_assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('template_assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('template_assets/css/material-dashboard.css?v=3.1.0') }}" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-200">
{{-- MENU LATERAL --}}
  @include('layouts.sidebar')

{{-- CABECERA --}}
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  @include('layouts.navbar')
{{-- CONTENIDO --}}
  @yield('contents')
{{-- PIE DE PÁGINA --}}
  @include('layouts.footer')
    </div>
  </main>

  <!--   Core JS Files   -->
  <script src="{{ asset('template_assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('template_assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('template_assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('template_assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('template_assets/js/plugins/chartjs.min.js') }}"></script>

  <script>

  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('template_assets/js/material-dashboard.min.js?v=3.1.0') }}"></script>
</body>

</html>
