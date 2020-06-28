<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Scotia Puntos</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{ URL::asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/vendors/line-awesome/css/line-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/vendors/themify-icons/css/themify-icons.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/vendors/animate.css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/vendors/toastr/toastr.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/vendors/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="{{ URL::asset('assets/vendors/fullcalendar/dist/fullcalendar.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/vendors/fullcalendar/dist/fullcalendar.print.min.css') }}" rel="stylesheet" media="print" />
    <link href="{{ URL::asset('assets/vendors/smalot-bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="{{ URL::asset('assets/css/main.min.css') }}" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->

    @yield('head')
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
        <header class="header">
            <div class="page-brand">
                <a href="{{url('/socios/comentarios')}}" style="font-size: 14px;">
                    <span class="brand">SCOTIA
                        <span class="brand-tip">PUNTOS</span>
                    </span>
                    <span class="brand-mini">AC</span>
                </a>
            </div>
            <div class="d-flex justify-content-between align-items-center flex-1">
                <!-- START TOP-LEFT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li>
                        <a class="nav-link sidebar-toggler js-sidebar-toggler" href="javascript:;">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                    </li>
                </ul>
                <!-- END TOP-LEFT TOOLBAR-->
                <!-- START TOP-RIGHT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li class="dropdown dropdown-user">
                        <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                            <span>{{Auth::user()->name}}</span>
                            <img src="{{ URL::asset('assets/img/users/partner.png') }}" alt="image" />
                        </a>
                        <div class="dropdown-menu dropdown-arrow dropdown-menu-right admin-dropdown-menu">
                            <div class="dropdown-arrow"></div>
                            <div class="dropdown-header">
                                <div class="admin-avatar">
                                    <img src="{{ URL::asset('assets/img/users/partner.png') }}" alt="image" />
                                </div>
                                <div>
                                    <h5 class="font-strong text-white">{{Auth::user()->name}}</h5>
                                    <div>
                                        <a href="{{url('/socios/cambiar_contrasena')}}"><span class="admin-badge"><i class="ti-lock mr-2"></i>Cambiar contraseña</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="admin-menu-content">
                                <div class="d-flex justify-content-between mt-2">
                                    <a class="d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Cerrar sesión<i class="ti-shift-right ml-2 font-20"></i></a>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <!-- END TOP-RIGHT TOOLBAR-->
            </div>
        </header>
        <!-- END HEADER-->
        <!-- START SIDEBAR-->
        <nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">
                <ul class="side-menu">
                    <li class="nav-2-level">
                        <a href="{{url('/socios/comentarios')}}"><i class="sidebar-item-icon ti-home"></i>
                            <span class="nav-label">Comentarios</span>
                        </a>
                    </li>
                    <li class="nav-2-level">
                        <a href="javascript:;"><i class="sidebar-item-icon ti-package"></i>
                            <span class="nav-label">Productos</span>
                        </a>
                        <div class="nav-2-level">
                            <ul>
                                <li>
                                    <a href="{{url('/socios/listado_productos')}}">Catalogo Activo</a>
                                </li>
                                <li>
                                    <a href="{{url('/socios/listado_productos_staging')}}">Catalogo en Staging</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-2-level">
                        <a href="{{url('/socios/marcas')}}"><i class="sidebar-item-icon ti-map-alt"></i>
                            <span class="nav-label">Tiendas</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

 <div class="wrapper content-wrapper">
         @yield('content')


<footer class="page-footer">
                <div class="font-13">2019 © <b>Scotiabank</b> - Datatrust ©</div>
                <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            </footer>
        </div>
    </div>
    <!-- START SEARCH PANEL-->
    <form class="search-top-bar" action="search.html">
        <input class="form-control search-input" type="text" placeholder="Search...">
        <button class="reset input-search-icon"><i class="ti-search"></i></button>
        <button class="reset input-search-close" type="button"><i class="ti-close"></i></button>
    </form>
    <!-- END SEARCH PANEL-->
    <!-- BEGIN THEME CONFIG PANEL-->
    <!-- END THEME CONFIG PANEL-->
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->


         <script src="{{ URL::asset('assets/vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendors/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendors/jquery-idletimer/dist/idle-timer.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendors/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendors/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="{{ URL::asset('assets/vendors/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendors/fullcalendar/dist/fullcalendar.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendors/smalot-bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <!-- CORE SCRIPTS-->
    <script src="{{ URL::asset('assets/js/app.min.js') }}"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="{{ URL::asset('assets/js/scripts/dashboard_6.js') }}"></script>
    <script src="{{ URL::asset('assets/js/scripts/calendar-demo.js') }}"></script>

        @yield('bottom-scripts')
</body>

</html>
