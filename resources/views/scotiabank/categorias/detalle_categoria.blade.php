@extends('scotiabank.layout.app')

@section('content')
 <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Categorias</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                         <a href="#"><i class="la la-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">Categorias</li>
                    <li class="breadcrumb-item">Ver Categoría</li>
                </ol>
            </div>

            <div class="page-content fade-in-up">

                    <div class="ibox">
                        <div style="margin-left:15px;padding:10px !important;">
                                <button class="btn btn-info checking mr-4">Editar</button>
                                <button class="btn btn-danger mr-2 btn-editar" type="submit" data-toggle="modal" data-target="#eliminar" onclick="eliminarData({{$showCat->id}})">Eliminar</button>
                        </div>
                        <div class="ibox-body">

                            <div class="row">
                                <div class="col-lg-4">
                                    <div>
                                            <img src="{{$showCat->icon_url}}" alt="image" />
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                        <form class="form-info" enctype="multipart/form-data" action="{{url('scotiabank/categoria/editar_categoria/'.$showCat->id)}}" method="post">
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
                                        <div class="form-group mb-4">
                                            <label>Nombre de la Categoria</label>
                                            <input class="form-control permit-input" name="name" value="{{$showCat->name}}" type="text" placeholder="Ingresa nombre de categoria" required>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 form-group mb-4">
                                                <label>Codigo de color</label>
                                                <input class="form-control permit-input" value="{{$showCat->color_code}}" name="color_code" type="text" placeholder="Codigo (formato: #A1B2C3)" minlength="4" required>
                                            </div>
                                            <div class="col-sm-6 form-group mb-4">
                                                    <label>Detalle de la Categoria</label>
                                                    <input class="form-control permit-input" value="" type="text" placeholder="Orden" name="order">
                                                </div>
                                        </div>

                                        <div class="form-group mb-4">
                                            <label>Detalle de la Categoria</label>
                                            <input class="form-control permit-input" type="text" value="{{$showCat->description}}" placeholder="Detalle de categoria" name="description">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label>PDF (url)</label>
                                            <input class="form-control permit-input" type="text" placeholder="Url del PDF" name="pdf_url" value="{{$showCat->pdf_url}}" required>
                                        </div>
                                        <div class="form-group mb-4">
                                                <label>Imagen</label>
                                                <input class="form-control permit-input" type="file" name="imgcat" value="{{$showCat->icon_url}}">
                                            </div>

                                            <div class="ibox-footer">

                                                    <div class="body-slide">
                                                        <button class="btn btn-primary mr-2 btn-editar" type="submit">Actualizar</button>
                                                        <button class="btn btn-secondary btn-cancel" type="reset">Cancelar</button>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="eliminar">
                                                        <div class="modal-dialog" style="width:400px;" role="document">
                                                            <div class="modal-content timeout-modal">
                                                                <div class="modal-body">
                                                                    <button class="close" data-dismiss="modal" aria-label="Close"></button>
                                                                    <div class="text-center mt-3 mb-4">
                                                                        <img class="mr-3" src="{{$showCat->icon_url}}" alt="{{ $showCat->name }}_img" width="300" />
                                                                    </div>
                                                                    <div class="text-center h4 mb-3">Eliminación de registro</div>
                                                                    <p class="text-center mb-4">¿Estás seguro que deseas eliminar la categoria: <strong>{{$showCat->name}}</strong> ? </p>
                                                                    <div id="timeout-activate-box">
                                                                            <div class="form-group text-center">
                                                                                    <a href="{{url('scotiabank/categoria/eliminar_categoria/'.$showCat->id)}}" class="btn btn-primary btn-fix btn-air">ACEPTAR</a>
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
