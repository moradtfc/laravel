@extends('scotiabank.layout.app')

@section('head')
<link href="{{ URL::asset('assets/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="page-heading">
                <h1 class="page-title">Marcas</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">Marcas</li>
                    <li class="breadcrumb-item">Agregar Nueva</li>
                </ol>
            </div>
<div class="page-content fade-in-up">
	<div class="row">
		<div class="col-md-12">
            <div class="ibox ibox-fullheight">
                            <div class="ibox-head">                            
                                <div class="ibox-title ml-3">
                                    <div class="row">
                                        <h5 class="font-strong mb-3 mt-5">Ficha de la Marca</h5>
                                    </div>
                                    <div class="row mb-3">
                                        <button class="btn btn-info checking mr-4">Editar</button>
                                        <button data-toggle="modal" data-target="#eliminar" class="btn btn-danger btn-delet">Eliminar</button>
                                    </div>

                                </div>
                                
                            </div>
                            <form class="form-info" enctype="multipart/form-data" action="{{url('scotiabank/editar_brand/'.$brand->id)}}" method="post">
                                @csrf
                                <div class="ibox-body">
                                    <div class="col-lg-4" style="display: inline-block; vertical-align: top">
                                        <div>
                                            <img src="{{$brand->final_url}}" alt="image" />
                                        </div>
                                    </div>
                                    <div class="col-lg-7" style="display: inline-block; vertical-align: top">
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
                                        <div class="col-sm-6 form-group mb-4">
                                            <label>Nombre</label>
                                            <input class="form-control permit-input" name="name" value="{{$brand->name}}" type="text" placeholder="Nombre" required="">
                                        </div>
                                         <div class="col-sm-6 form-group mb-4">
                                            <label>Subir Imagen</label>
                                            <input class="form-control permit-input" name="photo_url" type="file" >
                                        </div>                                  
                                    </div>
                                    <!--<div class="row">
                                    	<div class="col-sm-6 form-group mb-4" style="display: none;">
                                            <label>Descripción</label>
                                            <textarea class="form-control" name="" placeholder="Ingresa"  required=""></textarea>
                                        </div>
                                        <div class="col-sm-10 form-group mb-4" style="display: none;">
                                            <label>Url PDF</label>
                                            <input class="form-control" name="photo_url_alt" placeholder="">
                                        </div>
                                    </div>-->
                                    <div class="row">
                                        <div class="form-group col-sm-6 mb-4">
                                        <label>Estado</label>
                                        <div>
                                            <label class="radio radio-inline radio-info">
                                                <input type="radio" name="active_url" value="1" {{ ($brand->active_url=="1")? "checked" : "" }}>
                                                <span class="input-span"></span>Imagen File</label>
                                            <label class="radio radio-inline radio-info">
                                                <input type="radio" name="active_url" value="2" {{ ($brand->active_url=="2")? "checked" : "" }}>
                                                <span class="input-span"></span>Imagen Alternativo</label>
                                        </div>
                                        </div>
                                        <div class="col-sm-6 form-group mb-4">
                                             <label class="form-control-label">Socio</label>
                                                <select class="form-control select2_demo_1 permit-input" name="user_id">
                                                @foreach($users as $item)
                                                <option value="{{$item->id}}" {{$brandUserId == $item->id ? 'selected="selected"' : ''}} >{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-sm-6 mb-4">
                                            <label>Email</label>
                                            <input type="email" class="form-control permit-input" name="email" value="{{$brand->email}}" placeholder="Ingresar correo" >
                                        </div>
                                        <div class="col-sm-6 form-group mb-4">
                                             <label>Web</label>
                                            <input class="form-control permit-input" name="web" type="text" value="{{$brand->web}}" placeholder="Ingresa tu página" >
                                        </div>
                                    </div>

                                        <div class="ibox-footer pl-0">
                                            <div class="body-slide">
                                                <button class="btn btn-primary mr-2 btn-editar" type="submit">Actualizar</button>
                                                <a href="{{url('scotiabank/cancelar_proceso')}}" class="btn btn-secondary btn-cancel">Cancelar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="eliminar">
                                                        <div class="modal-dialog" style="width:400px;" role="document">
                                                            <div class="modal-content timeout-modal">
                                                                <div class="modal-body">
                                                                    <button class="close" data-dismiss="modal" aria-label="Close"></button>
                                                                    <div class="text-center mt-3 mb-4">
                                                                        <img class="mr-3" src="{{$brand->final_url}}" alt="{{ $brand->name }}_img" width="300" />
                                                                    </div>
                                                                    <div class="text-center h4 mb-3">Eliminación de registro</div>
                                                                    <p class="text-center mb-4">¿Estás seguro que deseas eliminar la marca: <strong>{{$brand->name}}</strong> ? </p>
                                                                    <div id="timeout-activate-box">
                                                
                                                         
                                                                            <div class="form-group text-center">
                                                                                    <a href="{{url('scotiabank/eliminar_brand/'.$brand->id)}}" class="btn btn-primary btn-fix btn-air">ACEPTAR</a>
                                                                                <button class="btn btn-danger btn-fix btn-air" id="timeout-reset" data-dismiss="modal" >CANCELAR</button>
                                                                            </div>

                                                                        </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                            </form>
                        </div>
        </div>
	</div>
</div>
@endsection
@section('bottom-scripts')

    <script src="{{ URL::asset('assets/vendors/select2/dist/js/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $(function(){
            $('.select2_demo_1').select2();
        });
    </script>
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