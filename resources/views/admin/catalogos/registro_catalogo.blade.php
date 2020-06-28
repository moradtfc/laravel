@extends('admin.layout.app')

@section('content')
 <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Catálogos</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">Catálogos</li>
                    <li class="breadcrumb-item">Registrar Catálogo</li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-10">
                        <div class="ibox ibox-fullheight">
                            <div class="ibox-head">
                                <div class="ibox-title">Agregar Catálogo</div>
                            </div>
                            <form class="form-info" enctype="multipart/form-data" action="{{ url('/registrar-catalogo') }}" method="post">
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

                                    <div class="form-group mb-4">
                                        <label>Nombre del Catálogo</label>
                                        <input class="form-control" type="text" placeholder="Nombre" name="name" required>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>Estatus</label>
                                        <input class="form-control" type="text" placeholder="Estatus" name="status" required>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>URL Catálogo</label>
                                        <input class="form-control" type="text" placeholder="Url" name="url">
                                    </div>

                                </div>
                                <div class="ibox-footer">
                                    <button class="btn btn-info mr-2" type="submit">Registrar catálogo</button>
                                    <button class="btn btn-secondary" type="reset">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection