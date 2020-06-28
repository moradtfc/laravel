<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Cambio de contraseña</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{ URL::asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/vendors/line-awesome/css/line-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/vendors/themify-icons/css/themify-icons.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/vendors/animate.css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/vendors/toastr/toastr.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/vendors/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <!-- THEME STYLES-->
    <link href="{{ URL::asset('assets/css/main.min.css') }}" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <style>
        body {
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url('{{ URL::asset('assets/img/blog/fondo1.jpg') }}');
        }

        .cover {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(117, 54, 230, .1);
        }

        .login-content {
            max-width: 400px;
            margin: 100px auto 50px;
        }

        .auth-head-icon {
            position: relative;
            height: 60px;
            width: 60px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            background-color: #fff;
            color: #5c6bc0;
            box-shadow: 0 5px 20px #d6dee4;
            border-radius: 50%;
            transform: translateY(-50%);
            z-index: 2;
        }
    </style>
</head>

<body>
    <div class="cover"></div>
    <div class="ibox login-content">
        <div class="text-center">
            <span class="auth-head-icon"><i class="la la-key"></i></span>
        </div>


        <form class="ibox-body pt-0" id="forgot-form" action="{{ url('/socios/actualizar_contrasena') }}" method="POST">
            @csrf
            <h4 class="font-strong text-center mb-4">CAMBIAR CONTRASEÑA</h4>
            <p class="mb-4">Ingresa los siguientes datos para cambiar tu contraseña.</p>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <div class="form-group mb-4">
                <input id="password"  class="form-control form-control-line" type="password" name="password" placeholder="Contraseña" required="true">
                    @if ($errors->has('password'))
                        <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
            </div>
            </div>

            <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
            <div class="form-group mb-4">

                <input id="new-password" class="form-control form-control-line" type="password" name="new-password"  placeholder="Contraseña Nueva" required="true">
                @if ($errors->has('new-password'))
                        <span class="help-block">
                        <strong>{{ $errors->first('new-password') }}</strong>
                    </span>
                    @endif
            </div>
            </div>
            <div class="form-group">
                    <div class="form-group mb-4">
                            <input id="new-password-confirm" class="form-control form-control-line" type="password" name="new-password_confirmation"  placeholder="Repetir contraseña" required="true">
                    </div>
                </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-rounded btn-block btn-air" style="background-color: #d81e05; color: white; border-color:#d81e05; ">Enviar</button>
            </div>


        </form>



        <!--<form class="ibox-body pt-0" id="forgot-form" action="" method="PUT">
              d@csrf
            <h4 class="font-strong text-center mb-4">CAMBIAR CONTRASEÑA</h4>
            <p class="mb-4">Ingresa los siguientes datos para cambiar tu contraseña.</p>
            <div class="form-group mb-4">
                <input class="form-control form-control-line" type="password" name="password" placeholder="Contraseña" required="true">
            </div>
            <div class="form-group mb-4">
                <input class="form-control form-control-line" type="password" name="password_new" placeholder="Contraseña Nueva" required="true">
            </div>
             <div class="form-group mb-4">
                <input class="form-control form-control-line" type="password" name="password_new_confirmation" placeholder="Repetir contraseña" required="true">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-rounded btn-block btn-air" style="background-color: #d81e05; color: white; border-color:#d81e05; ">Enviar</button>
            </div>
        </form>-->
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- CORE PLUGINS-->
    <script src="{{ URL::asset('assets/vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendors/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendors/jquery-idletimer/dist/idle-timer.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendors/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendors/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <!-- CORE SCRIPTS-->
    <script src="{{ URL::asset('assets/js/app.min.js') }}"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <!--<script>
        $(function() {
            $('#forgot-form').validate({
                errorClass: "help-block",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
    </script>-->
</body>

</html>
