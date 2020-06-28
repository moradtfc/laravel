@extends('admin.layout.app')

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
		<div class="col-md-10">
            <div class="ibox ibox-fullheight">
                            <div class="ibox-head">
                                <div class="ibox-title">Registrar Marca</div>
                            </div>
                            <form class="form-info" enctype="multipart/form-data" action="{{url('/registrar-brand')}}" method="post">
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
                                            <input class="form-control" name="name" type="text" placeholder="Nombre" required="">
                                        </div>
                                         <div class="col-sm-6 form-group mb-4">
                                            <label>Subir Imagen</label>
                                            <input class="form-control" name="photo_url" type="file" required="">
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
                                                <input type="radio" name="active_url" value="1" checked>
                                                <span class="input-span"></span>Imagen File</label>
                                            <label class="radio radio-inline radio-info">
                                                <input type="radio" name="active_url" value="2">
                                                <span class="input-span"></span>Imagen Alternativo</label>
                                        </div>
                                        </div>
                                        <div class="col-sm-6 form-group mb-4">
                                             <label class="form-control-label">Socio</label>
                                                <select class="form-control select2_demo_1" name="user_id">
                                                @foreach($users as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-sm-6 mb-4">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Ingresar correo" >
                                        </div>
                                        <div class="col-sm-6 form-group mb-4">
                                             <label>Web</label>
                                            <input class="form-control" name="web" type="text" placeholder="Ingresa tu página" >
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
@section('bottom-scripts')

    <script src="{{ URL::asset('assets/vendors/select2/dist/js/select2.full.min.js') }}"></script>
</script>
@endsection