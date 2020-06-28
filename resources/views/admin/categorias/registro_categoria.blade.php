@extends('admin.layout.app')

@section('content')
 <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Categorias</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                         <a href="{{url('/admin/dashboard')}}"><i class="la la-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">Categorias</li>
                    <li class="breadcrumb-item">Agregar nueva</li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-10">
                        <div class="ibox ibox-fullheight">
                            <div class="ibox-head">
                                <div class="ibox-title">Agregar categoria</div>
                            </div>
                            <form class="form-info" enctype="multipart/form-data" action="{{ url('/registrar-categoria') }}" method="post">
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
                                        <div class="col-sm-4 form-group mb-4">
                                            <label>Nombre de la categoria</label>
                                            <input class="form-control" name="name" type="text" placeholder="Ingresa nombre de categoria" required>
                                        </div>
                                        <div class="col-sm-4 form-group mb-4">
                                            <label>Codigo de color</label>
                                            <input class="form-control" name="color_code" type="text" placeholder="Codigo (formato: #A1B2C3)" minlength="4" required>
                                        </div>
                                         <div class="col-sm-4 form-group mb-4">
                                            <label>Orden</label>
                                            <input class="form-control" type="text" placeholder="Orden" name="order">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>Detalle de la categoria</label>
                                        <input class="form-control" type="text" placeholder="Detalle de categoria" name="description">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>PDF (url)</label>
                                        <input class="form-control" type="text" placeholder="Url del PDF" name="pdf_url" required>
                                    </div>
                                    <!--
                                    <div class="form-group mb-4">
                                        <label>Imagen alternativa (url)</label>
                                        <input class="form-control" type="text" placeholder="Url" name="icon_url_alternative">
                                    </div>

                                    <div class="form-group mb-0">
                                        <label>Url activa</label>
                                        <div>
                                            <label class="radio radio-inline radio-info">
                                                <input type="radio" value="1" name="active_url" checked required>
                                                <span class="input-span"></span>Image File</label>
                                            <label class="radio radio-inline radio-info">
                                                <input type="radio" name="active_url" value="2" required>
                                                <span class="input-span"></span>Imagen alternativa</label>
                                        </div>
                                    </div>
                                     -->
                                    <div class="row">
                                        <div class="col-sm-6 form-group mb-6">
                                            <label>Imagen</label>
                                            <input class="form-control" type="file" name="imgcat" required>
                                        </div>
                                        <!--
                                        <div class="col-sm-6 form-group mb-6">
                                            <label>Imagen adicional</label>
                                            <input class="form-control" type="file" name="imgadd">
                                        </div>
                                        -->
                                    </div>

                                </div>
                                <div class="ibox-footer">
                                    <button class="btn btn-info mr-2" type="submit">Registrar categoria</button>
                                    <button class="btn btn-secondary" type="reset">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection