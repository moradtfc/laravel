<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Scotia Puntos - Inicio</title>
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
            background-image: url("{{ URL::asset('assets/img/blog/fondo1.jpg') }}");
            background-repeat: no-repeat;
            background-size: cover;
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
            color: #ff4081;
            box-shadow: 0 5px 20px #d6dee4;
            border-radius: 50%;
            transform: translateY(-50%);
            z-index: 2;
        }
    </style>
</head>

<body>
    <div class="ibox login-content">
        <div class="text-center">
            <span class="auth-head-icon" style="color:#d81e05;"><i class="la la-user"></i></span>
        </div>
        <form class="ibox-body form-pink" id="login-form" action="{{ route('login') }}" method="POST">
            @csrf
            <h4 class="font-strong text-center mb-5">SCOTIA PUNTOS</h4>
            <div class="form-group mb-4">
                <input class="form-control form-control-rounded form-control-air form-control-lg form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" name="email" value="{{ old('email') }}" placeholder="Email">
            </div>
            <div class="form-group mb-4">
                <input class="form-control form-control-rounded form-control-air form-control-lg form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" placeholder="Password">
            </div>
            <div class="flexbox mb-5">
                <span>
                    <label class="ui-switch ui-switch-pink switch-icon mr-2 mb-0">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span></span>
                    </label>Recordarme</span>
                <a style="color: #d81e05;" href="forgot_password.html">Olvidaste tu contraseña?</a>
            </div>
            <div class="text-center mb-4">
                <button class="btn btn-lg btn-rounded btn-fix btn-air" style="width:200px;background-color: #d81e05; color: white;">Iniciar sesión</button>
            </div>
        </form>
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
    <script>
        $(function() {
            $('#login-form').validate({
                errorClass: "help-block",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
    </script>
</body>

</html>