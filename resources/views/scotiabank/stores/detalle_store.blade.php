@extends('scotiabank.layout.app')

@section('head')
<link href="{{ URL::asset('assets/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('content')

<div class="page-heading">
    <h1 class="page-title">Tiendas</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Tiendas</li>
        <li class="breadcrumb-item">Agregar Nueva</li>
       </ol>
 </div>

 <div class="page-content fade-in-up">
	<div class="row">
		<div class="col-md-10">
            <div class="ibox ibox-fullheight">
                            <div class="ibox-head">
                                <div class="ibox-title ml-4 mb-3">
                                    <div class="row">
                                        <h5 class="font-strong mb-3 mt-5">Ficha de la Tienda</h5>
                                    </div>
                                    <div class="row mb-3">
                                        <button class="btn btn-info checking mr-4">Editar</button>
                                        <button data-toggle="modal" data-target="#eliminar" class="btn btn-danger btn-delet">Eliminar</button>
                                    </div>
                                </div>
                            </div>
                            <form class="form-info" enctype="multipart/form-data" action="{{url('scotiabank/update_store/'.$show_store->id)}}" method="post">
                                @csrf
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
                                        <div class="col-sm-6 form-group mb-4">
                                            <label>Nombre</label>
                                            <input class="form-control permit-input" name="name" type="text" placeholder="" value="{{$show_store->name}}" required="">
                                        </div>
                                         <div class="col-sm-6 form-group mb-4">
                                            <label>Dirección</label>
                                            <input class="form-control permit-input" name="address" type="text" required="" value="{{$show_store->address}}">
                                        </div>                                  
                                    </div>
                                    <div class="row">
                                    	<div class="col-sm-6 form-group mb-4">
                                            <label>Latitud</label>
                                            <input class="form-control permit-input" type="text" name="latitude" placeholder="-12.2324" value="{{$show_store->latitude}}"  required="">
                                        </div>
                                        <div class="col-sm-6 form-group mb-4">
                                            <label>Longitud</label>
                                            <input class="form-control permit-input" type="text" name="longitude" placeholder="23.4565" value="{{$show_store->longitude}}" required="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group mb-4">
                                             <label>Marca</label>
                                            <select class="form-control select2_demo_1 permit-input" name="brand_id">
                                            	@foreach($brand as $item)
                                            	<option value="{{$item->id}}" {{$store_brand == $item->id ? 'selected="selected"' : ''}}>{{$item->name}}</option>
                                            	@endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-6 form-group mb-4">
                                            <label>Contacto</label>
                                            <input class="form-control permit-input" type="text" name="contact" placeholder="01-2121" value="{{$show_store->contact}}" required="">
                                        </div>
                                    </div>

                                </div>
                                <div class="ibox-footer">
                                    <div class="body-slide">
                                        <button class="btn btn-info mr-2" type="submit">Actualizar</button>
                                        <a href="{{url('scotiabank/cancel_proceso')}}" class="btn btn-secondary" type="reset">Cancelar</a>
                                    </div>
                                </div>

                                

                            </form>

                            <div class="modal fade" id="eliminar">
                                                        <div class="modal-dialog" style="width:400px;" role="document">
                                                            <div class="modal-content timeout-modal">
                                                                <div class="modal-body">
                                                                    <button class="close" data-dismiss="modal" aria-label="Close"></button>
                                                                    <div class="text-center h4 mb-3">Eliminación de registro</div>
                                                                    <p class="text-center mb-4">¿Estás seguro que deseas eliminar la tienda: <strong>{{$show_store->name}}</strong> ? </p>
                                                                    <div id="timeout-activate-box">
                                                                            <div class="form-group text-center">
                                                                                    <a href="{{url('scotiabank/eliminar_store/'.$show_store->id)}}" class="btn btn-primary btn-fix btn-air">ACEPTAR</a>
                                                                                <button class="btn btn-danger btn-fix btn-air" id="timeout-reset" data-dismiss="modal" >CANCELAR</button>
                                                                            </div>
                                                                        </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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