<aside class="sidenav navbar-collapse navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header col-md-12">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <div class="row col-md-12 ">
            <div class="col-md-6">
                <img src="{{ asset('template_assets/img/logo-unedl.png') }}" class="navbar-brand-img " style="width: 120px; heigth:120px" alt="main_logo">
            </div>
            <div class="col-md-6 mt-4">
                <span class="mt-1 ms-1 font-weight-bold text-white">{{ auth()->user()->name }} </span>
                <span class="ms-1  text-white">({{ auth()->user()->level }})</span>
            </div>
        </div>
    </div>
    <hr class="mt-3 horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Administración</h6>
        </li>
        @if (auth()->user()->level == 'administrador' )
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'bg-gradient-primary':'' }} text-white " href="{{ route('dashboard') }}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">assessment</i>
              </div>
              <span class="nav-link-text ms-1">Reportes</span>
            </a>
          </li>
          @endif
          @if (auth()->user()->level == 'administrador')
          <li class="nav-item">
            <a class="nav-link  {{ Request::is('materials') ? 'bg-gradient-primary':'' }} text-white " href="{{ route('materials') }}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">dashboard</i>
              </div>
              <span class="nav-link-text ms-1">Materiales</span>
            </a>
          </li>
          @endif
          @if (auth()->user()->level == 'administrador' )
          <li class="nav-item">
            <a class="nav-link  {{ Request::is('paid') ? 'bg-gradient-primary':'' }} text-white " href="{{ route('collections.paid') }}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">payments</i>
              </div>
              <span class="nav-link-text ms-1">Pagos</span>
            </a>
          </li>
          @endif
        <li class="nav-item">
          <a class="nav-link  {{ Request::is('perfil') ? 'bg-gradient-primary':'' }} text-white " href="{{ route('profile') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Perfil</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Operación</h6>
        </li>
        @if (auth()->user()->level == 'administrador' || auth()->user()->level == 'usuario'  )
        <li class="nav-item">
            <a class="nav-link  {{ Request::is('separations/create') ? 'bg-gradient-primary':'' }} text-white " href="{{ route('separations.create') }}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">feed</i>
              </div>
              <span class="nav-link-text ms-1">Formulario de Separación</span>
            </a>
          </li>
        @endif
        @if (auth()->user()->level == 'administrador')
          <li class="nav-item">
            <a class="nav-link  {{ Request::is('validations') ? 'bg-gradient-primary':'' }} text-white " href="{{ route('validations') }}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">checklist</i>
              </div>
              <span class="nav-link-text ms-1">Validación de Separaciones</span>
            </a>
          </li>
        @endif
        @if (auth()->user()->level == 'administrador' || auth()->user()->level == 'recolector'  )
          <li class="nav-item">
            <a class="nav-link  {{ Request::is('collections') ? 'bg-gradient-primary':'' }} text-white " href="{{ route('collections') }}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">recycling</i>
              </div>
              <span class="nav-link-text ms-1">Recolección</span>
            </a>
          </li>
        @endif
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Recolector</h6>
        </li>
        @if (auth()->user()->level == 'administrador' || auth()->user()->level == 'recolector'  )
        <li class="nav-item">
            <a class="nav-link  {{ Request::is('materials/pricelist') ? 'bg-gradient-primary':'' }} text-white " href="{{ route('materials.pricelist') }}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">feed</i>
              </div>
              <span class="nav-link-text ms-1">Lista de Precios</span>
            </a>
          </li>
        @endif
        @if (auth()->user()->level == 'administrador' || auth()->user()->level == 'recolector'  )
          <li class="nav-item">
            <a class="nav-link  {{ Request::is('collections/collect') ? 'bg-gradient-primary':'' }} text-white " href="{{ route('collections.view') }}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">recycling</i>
              </div>
              <span class="nav-link-text ms-1">Recolecciones</span>
            </a>
          </li>
        @endif
      </ul>
    </div>
    {{-- <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn btn-outline-primary mt-4 w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard?ref=sidebarfree" type="button">Documentation</a>
      </div>
    </div> --}}
  </aside>
