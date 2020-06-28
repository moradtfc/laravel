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
    @yield('head')
    <link href="{{ URL::asset('assets/css/main.min.css') }}" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->


</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
        <header class="header">
            <div class="page-brand">
                <a href="index.html" style="font-size: 14px;">
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
                    <li class="dropdown dropdown-notification">
                        <a class="nav-link dropdown-toggle toolbar-icon" data-toggle="dropdown" href="javascript:;"><i class="ti-bell rel"><span class="notify-signal"></span></i></a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                            <div class="dropdown-arrow"></div>
                            <div class="dropdown-header text-center">
                                <div>
                                    <span class="font-18"><strong>14 New</strong> Notifications</span>
                                </div>
                                <a class="text-muted font-13" href="javascript:;">view all</a>
                            </div>
                            <div class="p-3">
                                <ul class="timeline scroller" data-height="320px">
                                    <li class="timeline-item"><i class="ti-check timeline-icon"></i>2 Issue fixed<small class="float-right text-muted ml-2 nowrap">Just now</small></li>
                                    <li class="timeline-item"><i class="ti-announcement timeline-icon"></i>
                                        <span>7 new feedback
                                            <span class="badge badge-warning badge-pill ml-2">important</span>
                                        </span><small class="float-right text-muted">5 mins</small></li>
                                    <li class="timeline-item"><i class="ti-truck timeline-icon"></i>25 new orders sent<small class="float-right text-muted ml-2 nowrap">24 mins</small></li>
                                    <li class="timeline-item"><i class="ti-shopping-cart timeline-icon"></i>12 New orders<small class="float-right text-muted ml-2 nowrap">45 mins</small></li>
                                    <li class="timeline-item"><i class="ti-user timeline-icon"></i>18 new users registered<small class="float-right text-muted ml-2 nowrap">1 hrs</small></li>
                                    <li class="timeline-item"><i class="ti-harddrives timeline-icon"></i>
                                        <span>Server Error
                                            <span class="badge badge-success badge-pill ml-2">resolved</span>
                                        </span><small class="float-right text-muted">2 hrs</small></li>
                                    <li class="timeline-item"><i class="ti-info-alt timeline-icon"></i>
                                        <span>System Warning
                                            <a class="text-purple ml-2">Check</a>
                                        </span><small class="float-right text-muted ml-2 nowrap">12:07</small></li>
                                    <li class="timeline-item"><i class="fa fa-file-excel-o timeline-icon"></i>The invoice is ready<small class="float-right text-muted ml-2 nowrap">12:30</small></li>
                                    <li class="timeline-item"><i class="ti-shopping-cart timeline-icon"></i>5 New Orders<small class="float-right text-muted ml-2 nowrap">13:45</small></li>
                                    <li class="timeline-item"><i class="ti-arrow-circle-up timeline-icon"></i>Production server up<small class="float-right text-muted ml-2 nowrap">1 days ago</small></li>
                                    <li class="timeline-item"><i class="ti-harddrives timeline-icon"></i>Server overloaded 91%<small class="float-right text-muted ml-2 nowrap">2 days ago</small></li>
                                    <li class="timeline-item"><i class="ti-info-alt timeline-icon"></i>Server error<small class="float-right text-muted ml-2 nowrap">2 days ago</small></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown dropdown-user">
                        <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                            <span>{{Auth::user()->name}}</span>
                            <img src="{{ URL::asset('assets/img/users/admin-image.png') }}" alt="image" />
                        </a>
                        <div class="dropdown-menu dropdown-arrow dropdown-menu-right admin-dropdown-menu">
                            <div class="dropdown-arrow"></div>
                            <div class="dropdown-header">
                                <div class="admin-avatar">
                                    <img src="{{ URL::asset('assets/img/users/admin-image.png') }}" alt="image" />
                                </div>
                                <div>
                                    <h5 class="font-strong text-white">{{Auth::user()->name}}</h5>
                                    <div>
                                        <span class="admin-badge mr-3"><i class="ti-alarm-clock mr-2"></i>30m.</span>
                                        <span class="admin-badge"><i class="ti-lock mr-2"></i>Safe Mode</span>
                                    </div>
                                </div>
                            </div>
                            <div class="admin-menu-features">
                                <a class="admin-features-item" href="javascript:;"><i class="ti-user"></i>
                                    <span>PERFIL</span>
                                </a>
                                <a class="admin-features-item" href="javascript:;"><i class="ti-settings"></i>
                                    <span>CONFIGURACIONES</span>
                                </a>
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
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon ti-package"></i>
                            <span class="nav-label">Productos</span>
                        </a>
                        <div class="nav-2-level">
                            <ul>
                                <li>
                                    <a href="{{url('/scotiabank/listado_productos')}}">Catalogo Activo</a>
                                </li>
                                <li>
                                    <a href="{{url('/scotiabank/listado_productos_staging')}}">Catalogo Staging</a>
                                </li>
                                <li>
                                    <a href="{{ url('/scotiabank/registro_producto') }}">Agregar nuevo</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon ti-layers-alt"></i>
                            <span class="nav-label">Categorias</span>
                        </a>
                        <div class="nav-2-level">
                            <ul>
                                <li>
                                    <a href="{{ url('scotiabank/categoria/listado_categorias') }}">Todas</a>
                                </li>
                                <li>
                                    <a href="{{ url('scotiabank/categoria/registro_categoria') }}">Agregar nuevo</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon ti-shopping-cart"></i>
                            <span class="nav-label">Marcas</span>
                        </a>
                        <div class="nav-2-level">
                            <ul>
                                <li>
                                    <a href="{{url('scotiabank/listado-brand')}}">Todas</a>
                                </li>
                                <li>
                                    <a href="{{url('/registro-brand')}}">Agregar nuevo</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon ti-map-alt"></i>
                            <span class="nav-label">Tiendas</span>
                        </a>
                        <div class="nav-2-level">
                            <ul>
                                <li>
                                    <a href="{{url('scotiabank/listado-store')}}">Todas</a>
                                </li>
                                <li>
                                    <a href="{{url('/registro-store')}}">Agregar nueva</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon ti-gallery"></i>
                            <span class="nav-label">Catalogos</span>
                        </a>
                        <div class="nav-2-level">
                            <ul>
                                <li>
                                    <a href="{{url('/listado-catalogo')}}">Todos</a>
                                </li>
                                <li>
                                    <a href="{{url('/registro-catalogo')}}">Agregar nuevo</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!--
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon ti-user"></i>
                            <span class="nav-label">Usuarios</span>
                        </a>
                        <div class="nav-2-level">
                            <ul>
                                <li>
                                    <a href="{{ url('/listado-usuario') }}">Todos</a>
                                </li>
                                <li>
                                    <a href="{{ url('/registrar-usuario') }}">Agregar nuevo</a>
                                </li>
                            </ul>
                        </div>
                    </li> -->
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon ti-layout-tab-window"></i>
                            <span class="nav-label">Historial</span>
                        </a>
                        <div class="nav-2-level">
                            <ul>
                                <li>
                                <a href="{{ url('/scotiabank/listado_comentarios')}}">Todos</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon ti-user"></i>
                            <span class="nav-label">Usuarios</span>
                        </a>
                        <div class="nav-2-level">
                            <ul>
                                <li>
                                    <a href="{{url('/scotiabank/listado_usuarios')}}">Todos</a>
                                </li>
                                <li>
                                    <a href="{{url('/scotiabank/registro_usuarios')}}">Agregar nuevo</a>
                                </li>
                            </ul>
                        </div>
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
    <div class="theme-config">
        <div class="theme-config-toggle"><i class="ti-settings theme-config-show"></i><i class="ti-close theme-config-close"></i></div>
        <div class="theme-config-box">
            <h5 class="text-center mb-4 mt-3">SETTINGS</h5>
            <div class="font-strong mb-3">LAYOUT OPTIONS</div>
            <div class="check-list mb-4">
                <label class="checkbox checkbox-grey checkbox-primary">
                    <input id="_fixedNavbar" type="checkbox" checked>
                    <span class="input-span"></span>Fixed navbar</label>
                <label class="checkbox checkbox-grey checkbox-primary mt-3">
                    <input class="js-sidebar-toggler" type="checkbox">
                    <span class="input-span"></span>Collapse sidebar</label>
                <label class="checkbox checkbox-grey checkbox-primary mt-3">
                    <input id="_drawerSidebar" type="checkbox">
                    <span class="input-span"></span>Drawer sidebar</label>
            </div>
            <div class="mb-3 font-strong">THEME COLORS</div>
            <div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Default" style="background-color:#34495f;">
                    <label>
                        <input type="radio" name="setting-theme" value="default" checked>
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                    </label>
                </div>
                <div class="color-skin-box bg-primary" data-toggle="tooltip" data-original-title="Purple">
                    <label>
                        <input type="radio" name="setting-theme" value="purple">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Peach" style="background-image: linear-gradient(45deg,#f39c12 0,#e91e63 100%);">
                    <label>
                        <input type="radio" name="setting-theme" value="gradient-peach">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Gradient Purple" style="background-image: linear-gradient(45deg,#ff4081 0,#7536e6 100%);">
                    <label>
                        <input type="radio" name="setting-theme" value="gradient-purple">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Gradient Blue" style="background-image: linear-gradient(45deg,#00dcaf 0,#7536e6 100%);">
                    <label>
                        <input type="radio" name="setting-theme" value="gradient-blue">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                    </label>
                </div>
            </div>
            <div>
                <div class="color-skin-box bg-secondary" data-toggle="tooltip" data-original-title="Light">
                    <label>
                        <input type="radio" name="setting-theme" value="light-sidebar">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Dark Blue" style="background-color:#34495f;">
                    <label>
                        <input type="radio" name="setting-theme" value="dark-blue">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Bright purple" style="background-color:#7536e6;">
                    <label>
                        <input type="radio" name="setting-theme" value="bright-purple">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                    </label>
                </div>
                <div class="color-skin-box bg-success" data-toggle="tooltip" data-original-title="Green">
                    <label>
                        <input type="radio" name="setting-theme" value="green">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                    </label>
                </div>
                <div class="color-skin-box bg-info" data-toggle="tooltip" data-original-title="Blue">
                    <label>
                        <input type="radio" name="setting-theme" value="blue">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
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
    @yield('bottom-scripts')
    <!-- CORE SCRIPTS-->
    <script src="{{ URL::asset('assets/js/app.min.js') }}"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="{{ URL::asset('assets/js/scripts/dashboard_6.js') }}"></script>
    <script src="{{ URL::asset('assets/js/scripts/calendar-demo.js') }}"></script>

</body>

</html>
