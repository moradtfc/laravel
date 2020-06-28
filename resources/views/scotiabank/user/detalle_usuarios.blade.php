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
    
        <div class="ibox-head">
            <div class="ibox-title ml-3">
                                    <div class="row">
                                        <h5 class="font-strong mb-3 mt-5">Ficha del Usuario</h5>
                                    </div>
                                    <div class="row mb-3">
                                        <button class="btn btn-info checking mr-4">Editar</button>
                                        <button data-toggle="modal" data-target="#eliminar" class="btn btn-danger btn-delet">Eliminar</button>
                                    </div>

                                </div>
        </div>
        <div class="ibox-body">
            <form class="form-info" action="{{url('scotiabank/editar-usuario/'.$users->id)}}" method="post">
        @csrf
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
                        <input class="form-control permit-input" type="text" placeholder="Ingresa nombre del usuario" name="name" required="" value="{{$users->name}}">
                    </div>

                    <!--<div class="form-group mb-4">
                        <label>Contraseña</label>
                        <div class="input-group-icon input-group-icon-left">
                        <span class="input-icon input-icon-left"><i class="ti-lock"></i></span>
                        <input class="form-control" type="password" placeholder="Ingrese contraseña" value="" required="" name="password">
                        </div>
                    </div>-->
                </div>
                <div class="col-md-6">
                        <div class="form-group mb-4">
                                <label>Correo</label>
                        <input class="form-control permit-input" type="text" placeholder="Ingresa correo electrónico" required="" name="email" value="{{ $users->email }}">
                        </div>
                    <!--<div class="form-group mb-4">
                        <label>Repite Contraseña</label>
                        <div class="input-group-icon input-group-icon-left">
                            <span class="input-icon input-icon-left"><i class="ti-lock"></i></span>
                            <input class="form-control" type="password" placeholder="Repite la contraseña" required="" name="password_confirmation">
                        </div>
                    </div>-->
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
            <div class="body-slide">
                <button class="btn btn-primary mr-2" type="submit">Actualizar</button>
            <a href="{{url('scotiabank/cancelar_proceso_user')}}" class="btn btn-outline-secondary" type="reset">Cancelar</a>
            </div>
        </div>
    </form>

    <div class="modal fade" id="eliminar">
                                                        <div class="modal-dialog" style="width:400px;" role="document">
                                                            <div class="modal-content timeout-modal">
                                                                <div class="modal-body">
                                                                    <button class="close" data-dismiss="modal" aria-label="Close"></button>
                                                                    <div class="text-center h4 mb-3">Eliminación de registro</div>
                                                                    <p class="text-center mb-4">¿Estás seguro que deseas eliminar al usuario: <strong>{{$users->name}}</strong> ? </p>
                                                                    <div id="timeout-activate-box">
                                                
                                                         
                                                                            <div class="form-group text-center">
                                                                                    <a href="{{url('scotiabank/eliminar_user/'.$users->id)}}" class="btn btn-primary btn-fix btn-air">ACEPTAR</a>
                                                                                <button class="btn btn-danger btn-fix btn-air" id="timeout-reset" data-dismiss="modal" >CANCELAR</button>
                                                                            </div>

                                                                        </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


</div>
@endsection

@section('bottom-scripts')
    <script type="text/javascript">
    $(function(){
        $('.permit-input').prop('disabled', true);

        $('.body-slide').css( "display","none" );

        $('.checking').click(function(){
           // $('.checking').prop('checked',true);
           $('.body-slide').slideToggle( "slow" );

                $('.permit-input').prop('disabled', false);
            console.log(prop);

        });
    });
    </script>
@endsection
