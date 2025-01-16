
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('template_assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('template_assets/img/favicon.ico') }}">
  <title>
   Registro Sistema de Control de Separación y Recolección de Residuos
  </title>
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
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('template_assets/img/logo-unedl.png'); background-size: cover; width:640px;">
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header">
                  <h4 class="font-weight-bolder">Registro</h4>
                  <p class="mb-0">Ingresa tu Email para Registrarte</p>
                </div>
                <div class="card-body">
                  <form action="{{ route('register.save') }}" method="POST" class="user">
                    @csrf
                    <div class="input-group input-group-outline mb-3">
                        <select class="form-select" name="level" id="level" required>
                          <option value="usuario"  class="form-control">Seleccione un perfil ...</option>
                          <option value="usuario"  class="form-control">usuario</option>
                          <option value="recolector"  class="form-control">recolector</option>
                          <option value="administrador"  class="form-control">administrador</option>
                        </select>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Nombre Completo</label>
                      <input required name="name" type="text" class="form-control @error('name')isinvalid @enderror">
                      @error('name')
                      <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Email</label>
                      <input required name="email" type="email" class="form-control @error('email')isinvalid @enderror">
                      @error('email')
                      <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Contraseña</label>
                      <input required name="password" type="password" class="form-control @error('password')isinvalid @enderror">
                      @error('password')
                      <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Confirmar Contraseña</label>
                        <input required name="password_confirmation" type="password" class="form-control @error('password_confirmation')isinvalid @enderror">
                        @error('password_confirmation')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Registrarse</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    Ya Tienes Cuenta?
                    <a href="{{ route('login') }}" class="text-primary text-gradient font-weight-bold">Iniciar Sesión</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src={{ asset('template_assets/js/core/popper.min.js') }}></script>
  <script src={{ asset('template_assets/js/core/bootstrap.min.js') }}></script>
  <script src={{ asset('template_assets/js/plugins/perfect-scrollbar.min.js') }}></script>
  <script src={{ asset('template_assets/js/plugins/smooth-scrollbar.min.js') }}></script>
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
