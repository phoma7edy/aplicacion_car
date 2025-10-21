@php
    $rol = Auth::user()->rol->nombreRol ?? '';
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>contend admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('css/vendorsAdmin/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendorsAdmin/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('css/vendorsAdmin/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendorsAdmin/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendorsAdmin/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendorsAdmin/owl-carousel-2/owl.theme.default.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('css/styleAdmin.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('img/icons/logo.png') }}" />
    {{-- iconos  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    {{-- jQuery table --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    {{-- ALERTS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>







    {{-- <!-- DataTables con Bootstrap 5 -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- DataTables y Bootstrap 5 JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
 --}}






</head>

<body class="bg-dark">

    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo" href=""><img src="{{ asset('img/icons/logo.png') }}"
                        alt="logo" style="width: 80px; height: 70px;" /></a>
                <a class="sidebar-brand brand-logo-mini" href=""><img src="{{ asset('img/icons/logo.png') }}"
                        alt="logo" /></a>
            </div>
            <ul class="nav">

                <li class="nav-item nav-category">
                    <span class="nav-link">NAVEGATION</span>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{ route('admin.logHome') }}">
                        <span class="menu-icon">
                            <i class="mdi mdi-speedometer"></i>
                        </span>
                        <span class="menu-title">HOME</span>
                    </a>
                </li>
                @unless (Auth::user()->rol->nombreRol === 'administrador')
                    <!-- Botón eliminar aquí -->

                    <li class="nav-item menu-items">
                        <a class="nav-link" data-toggle="collapse" href="#register" aria-expanded="false"
                            aria-controls="register">
                            <span class="menu-icon">
                                <i class="mdi mdi-plus-circle text-success"></i>
                            </span>
                            <span class="menu-title">REGISTER</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="register">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" data-bs-toggle="modal"
                                        data-bs-target="#user_register">Usuario <i
                                            class="fa-solid fa-pen-to-square"></i></a></li>
                                <li class="nav-item"> <a class="nav-link" data-bs-toggle="modal"
                                        data-bs-target="#preveedor_register">Proveedor <i
                                            class="fa-solid fa-pen-to-square"></i></a></li>
                                <li class="nav-item"> <a class="nav-link" data-bs-toggle="modal"
                                        data-bs-target="#vehiculo_register">Vehiculos <i
                                            class="fa-solid fa-pen-to-square"></i></a></li>
                                {{-- <li class="nav-item"> <a class="nav-link" href="{{route('proveedor')}}">Proveedor</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{route('vehiculo')}}">Vehiculos</a></li> --}}
                            </ul>
                        </div>
                    </li>
                @endunless
                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#mostrar" aria-expanded="false"
                        aria-controls="mostrar">
                        <span class="menu-icon">
                            <i class="mdi mdi-eye"></i>
                        </span>
                        <span class="menu-title">SHOW</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="mostrar">
                        <ul class="nav flex-column sub-menu">
                            {{-- <li class="nav-item"> <a class="nav-link" href="{{route('mostrar.proveedor')}}">Proveedor</a></li> EJEMPLO CON USO ANTERIOR --}}
                            <li class="nav-item"> <a class="nav-link" href="#mostrar_usuario"
                                    data-bs-toggle="collapse">Usuario</a></li>
                            <li class="nav-item"> <a class="nav-link" href="#mostrar_proveedor"
                                    data-bs-toggle="collapse">Proveedor</a></li>
                            <li class="nav-item"> <a class="nav-link" href="#mostrar_vehiculo"
                                    data-bs-toggle="collapse">Producto</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="#">
                        <span class="menu-icon">
                            <i class="mdi mdi-chart-bar"></i>
                        </span>
                        <span class="menu-title">REPORTS</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" aria-controls="auth">
                        <span class="menu-icon">
                            <i class="mdi mdi-logout"></i>
                        </span>
                        <span class="menu-title">LOG-OUT</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar p-0 fixed-top d-flex flex-row">
                <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo-mini" href="#"><img
                            src="{{ asset('img/icons/logo.png') }}" alt="logo" /></a>
                </div>
                <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <ul class="navbar-nav w-100">
                        <li class="nav-item w-100">
                            <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                                <input type="text" class="form-control" placeholder="Search products">
                            </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item dropdown d-none d-lg-block">
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                aria-labelledby="createbuttonDropdown">
                                {{-- <h3>Escanea este código QR con Google Authenticator</h3>
<img src="{{ $inlineUrl }}" alt="QR Code">

<p>Clave secreta de respaldo: <strong>{{ $secret }}</strong></p>

<form method="POST" action="{{ route('2fa.confirm') }}">
    @csrf
    <label for="otp">Ingresa el código de 6 dígitos de tu app</label>
    <input type="text" name="one_time_password" required>
    <button type="submit">Confirmar</button>
</form> --}}
{{-- 




<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#twoFactorModal">
  Habilitar 2FA
</button>
<!-- Modal -->
<div class="modal fade" id="twoFactorModal" tabindex="-1" aria-labelledby="twoFactorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="twoFactorModalLabel">Autenticación de dos factores</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <div class="modal-body text-center">
        @if(session('2fa_secret') || isset($inlineUrl))
            <h6>Escanea este código QR con Google Authenticator</h6>
            <img src="{{ $inlineUrl ?? '' }}" alt="QR Code" class="mb-3">

            <p>O usa esta clave secreta:  
                <strong>{{ $secret ?? '' }}</strong>
            </p>

            <form method="POST" action="{{ route('2fa.enable') }}">
                @csrf
                <button type="submit" class="btn btn-success">Activar 2FA</button>
            </form>
        @else
            <p>Haz clic en "Generar QR" para comenzar a configurar 2FA.</p>
            <a href="{{ route('2fa.show') }}" class="btn btn-primary">Generar QR</a>
        @endif
      </div>

    </div>
  </div>
</div> --}}




                            </div>
                        </li>
                        <li class="nav-item dropdown d-none d-lg-block">
                            <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown"
                                data-toggle="dropdown" aria-expanded="false" href="#">+ Add New</a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                aria-labelledby="createbuttonDropdown">
                                <h6 class="p-3 mb-0">Novedades</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-file-outline text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1">oferts</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-web text-info"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1">Promotions</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-layers text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1">Descounts</p>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown border-left">
                            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#"
                                data-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-email"></i>
                                <span class="count bg-success"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                aria-labelledby="messageDropdown">
                                <h6 class="p-3 mb-0">Messages</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        {{-- <img src="assets/images/faces/face4.jpg" alt="image" class="rounded-circle profile-pic"> --}}
                                        <i class="mdi mdi-account-tie text-success"></i>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1">Mark send you a message</p>
                                        <p class="text-muted mb-0"> 1 Minutes ago </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        {{-- <img src="assets/images/faces/face2.jpg" alt="image" class="rounded-circle profile-pic"> --}}
                                        <i class="mdi mdi-account-tie text-success"></i>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1">Cregh send you a message</p>
                                        <p class="text-muted mb-0"> 15 Minutes ago </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        {{-- <img src="assets/images/faces/face3.jpg" alt="image" class="rounded-circle profile-pic"> --}}
                                        <i class="mdi mdi-account-tie text-success"></i>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1">Profile picture updated</p>
                                        <p class="text-muted mb-0"> 18 Minutes ago </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <p class="p-3 mb-0 text-center">4 new messages</p>
                            </div>
                        </li>
                        <li class="nav-item dropdown border-left">
                            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown"
                                href="#" data-toggle="dropdown">
                                <i class="mdi mdi-bell"></i>
                                <span class="count bg-danger"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                aria-labelledby="notificationDropdown">
                                <h6 class="p-3 mb-0">Notifications</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-calendar text-success"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Event today</p>
                                        <p class="text-muted ellipsis mb-0"> Just a reminder that you have an event
                                            today </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-settings text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Settings</p>
                                        <p class="text-muted ellipsis mb-0"> Update dashboard </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-link-variant text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Launch Admin</p>
                                        <p class="text-muted ellipsis mb-0"> New admin wow! </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <p class="p-3 mb-0 text-center">See all notifications</p>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                                <div class="navbar-profile">
                                    {{-- <img class="img-xs rounded-circle" src="assets/images/faces/face15.jpg" alt=""> --}}
                                    <i class="mdi mdi-account-circle"></i>
                                    <p class="mb-0 d-none d-sm-block navbar-profile-name">
                                        @if (Auth::check())
                                            <h6>{{ Auth::user()->nomUsuario }}</h6>
                                        @endif
                                        <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                </div>
                                @if (Auth::check())
                                    <h5>{{ Auth::user()->rol->nombreRol }}</h5>
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                aria-labelledby="profileDropdown">
                                <h6 class="p-3 mb-0">Profile</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-settings text-success"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Settings Acount</p>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-onepassword  text-info"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item" href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-logout text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p>Log Out</p>
                                    </div>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                                <div class="dropdown-divider"></div>
                                <p class="p-3 mb-0 text-center">Advanced settings</p>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                        <span class="mdi mdi-format-line-spacing"></span>
                    </button>
                </div>
            </nav>
            <!-- partial -->

            @yield('contentAdmin')

            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>





</body>

<script src="https://code.jquery.com/jquery-3.7.1.min.js "></script>​




{{-- 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

 --}}







{{-- <!-- jQuery primero -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables + Bootstrap 5 -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<!-- DataTables CSS (esto puede ir en el <head>) -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
 --}}


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<!-- container-scroller -->
{{-- TABLA PARA MOSTRAR LOS DATOS CON JQUERY RESPONSIVO --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}

{{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}



<!-- jQuery -->
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

<!-- DataTables CSS -->
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"> --}}

<!-- DataTables JS -->
{{-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> --}}





{{--  --}}
<!-- plugins:js -->
<script src="{{ asset('css/vendorsAdmin/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('css/vendorsAdmin/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('css/vendorsAdmin/progressbar.js/progressbar.min.js') }}"></script>
<script src="{{ asset('css/vendorsAdmin/jvectormap/jquery-jvectormap.min.js') }}"></script>
<script src="{{ asset('css/vendorsAdmin/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('css/vendorsAdmin/owl-carousel-2/owl.carousel.min.js') }}"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('js/off-canvas.js') }}"></script>
<script src="{{ asset('js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('js/misc.js') }}"></script>
<script src="{{ asset('js/settings.js') }}"></script>
<script src="{{ asset('js/todolist.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{ asset('js/dashboard.js') }}"></script>
<!-- End custom js for this page -->

</html>="{{ asset('js/off-canvas.js') }}"></script>
<script src="{{ asset('js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('js/misc.js') }}"></script>
<script src="{{ asset('js/settings.js') }}"></script>
<script src="{{ asset('js/todolist.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{ asset('js/dashboard.js') }}"></script>
<!-- End custom js for this page -->

</html>="{{ asset('js/off-canvas.js') }}"></script>
<script src="{{ asset('js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('js/misc.js') }}"></script>
<script src="{{ asset('js/settings.js') }}"></script>
<script src="{{ asset('js/todolist.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{ asset('js/dashboard.js') }}"></script>
<!-- End custom js for this page -->

</html>
