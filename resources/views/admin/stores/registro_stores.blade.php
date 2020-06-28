@extends('admin.layout.app')
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
                                <div class="ibox-title">Registrar Tiendas</div>
                            </div>
                            <form class="form-info" enctype="multipart/form-data" action="{{url('/registrar-store')}}" method="post">
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
                                            <input class="form-control" name="name" type="text" placeholder="" required="">
                                        </div>
                                         <div class="col-sm-6 form-group mb-4">
                                            <label>Dirección</label>
                                            <input class="form-control" name="address" type="text" required="">
                                        </div>                                  
                                    </div>
                                    <div class="row">
                                    	<div class="col-sm-6 form-group mb-4">
                                            <label>Latitud</label>
                                            <input class="form-control" type="text" name="latitude" placeholder="-12.2324"  required="">
                                        </div>
                                        <div class="col-sm-6 form-group mb-4">
                                            <label>Longitud</label>
                                            <input class="form-control" type="text" name="longitude" placeholder="23.4565"  required="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group mb-4">
                                             <label>Marca</label>
                                            <select class="form-control" name="brand_id">
                                            	@foreach($brand as $item)
                                            	<option value="{{$item->id}}">{{$item->name}}</option>
                                            	@endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-6 form-group mb-4">
                                            <label>Contacto</label>
                                            <input class="form-control" type="text" name="contact" placeholder="01-23223"  required="">
                                        </div>
                                    </div>

                                </div>
                                <div class="ibox-footer">
                                    <button class="btn btn-info mr-2" type="submit">Registrar</button>
                                    <button class="btn btn-secondary" type="reset">Cancelar</button>
                                </div>
                            </form>
                        </div>
        </div>
	</div>
</div>

@endsection