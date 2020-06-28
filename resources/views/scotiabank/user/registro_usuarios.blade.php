@extends('scotiabank.layout.app')

@section('content')
  <div class="page-heading">
                <h1 class="page-title">Registrar usuario</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{url('/scotiabank/dashboard')}}"><i class="la la-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">Usuarios</li>
                    <li class="breadcrumb-item">Agregar nueva</li>
                </ol>
            </div>

<div class="ibox">
    <form class="form-info" action="{{url('scotiabank/registrar-usuario')}}" method="post">
        @csrf
        <div class="ibox-head">
            <div class="ibox-title">Usuario</div>
        </div>
        <div class="ibox-body">
             @if(session()->has('msj'))

                                      <div class="alert alert-info alert-dismissable fade show alert-bordered">
                                    <button class="close" data-dismiss="alert" aria-label="Close"></button><strong>¡Enhorabuena!</strong><br>{{ session('msj')  }}</div>

                                      @else
                                    @if ($errors->any())
                                    <div id="error" class="alert alert-danger" role="alert" style="width: 100%;">
                                    @foreach ($errors->all() as $error)
                                      <span>{{ $error }}</span></br>
                                         @endforeach
                                         </div>
                                            @endif




                                      @endif

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label>Nombres</label>
                        <input class="form-control" type="text" placeholder="Ingresa nombre del usuario" name="name" required="" value="{{ old('name') }}">
                    </div>

                    <div class="form-group mb-4">
                        <label>Contraseña</label>
                        <div class="input-group-icon input-group-icon-left">
                        <span class="input-icon input-icon-left"><i class="ti-lock"></i></span>
                        <input class="form-control" type="password" placeholder="Ingrese contraseña" required="" name="password">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                        <div class="form-group mb-4">
                                <label>Correo</label>
                        <input class="form-control" type="text" placeholder="Ingresa correo electrónico" required="" name="email" value="{{ old('email') }}">
                        </div>
                    <div class="form-group mb-4">
                        <label>Repite Contraseña</label>
                        <div class="input-group-icon input-group-icon-left">
                            <span class="input-icon input-icon-left"><i class="ti-lock"></i></span>
                            <input class="form-control" type="password" placeholder="Repite la contraseña" required="" name="password_confirmation">
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="form-group mb-0">
                <label>Tipo de Usuario</label>
                <div class="mt-1">

                    <label class="radio radio-inline radio-grey radio-primary">
                        <input type="radio" name="id_rol" value="1" checked required="">
                        <span class="input-span"></span>Administrador</label>
                    <label class="radio radio-inline radio-grey radio-primary">
                        <input type="radio" name="id_rol" value="2" required="">
                        <span class="input-span"></span>Scotiabank</label>
                        <label class="radio radio-inline radio-grey radio-primary">
                        <input type="radio" name="id_rol" value="3" required="">
                        <span class="input-span"></span>Socio</label>
                </div>
                <span class="help-block">Seleccione uno de los tipos de cuenta.</span>
            </div>-->
        </div>
        <div class="ibox-footer">
            <button class="btn btn-primary mr-2" type="submit">Registrar</button>
            <button href="#" class="btn btn-outline-secondary" type="reset">Cancelar</button>
        </div>
    </form>
</div>
@endsection
