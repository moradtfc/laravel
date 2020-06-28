@extends('admin.layout.app')

@section('head')
<link href="{{ URL::asset('assets/vendors/dataTables/datatables.min.css') }}" rel="stylesheet" />
<style type="text/css">
    #body_comentarios{
        height: 450px !important;
        overflow-y: auto;
    }
</style>
@endsection

@section('content')
 <div class="page-heading">
                <h1 class="page-title">Producto</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#"><i class="la la-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">Producto</li>
                    <li class="breadcrumb-item">Ficha</li>
                </ol>
</div>


<div class="page-content fade-in-up">
                <div class="ibox">
					<div class="ibox-body">
                        <h5 class="font-strong mb-5">Ficha del Producto</h5>
                        <div class="row">
                            <div class="col-lg-4">
                                <div>
                                <img src="{{$productos->final_url}}" alt="image" />
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <form action="javascript:;">
                                    <div class="form-group mb-4">
                                        <label>Nombre del Producto</label>
                                    <input class="form-control form-control-solid" type="text" placeholder="" value="{{$productos->name}}" disabled>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 form-group mb-4">
                                            <label>Categoría</label>
                                        <input class="form-control form-control-solid" type="text" value="{{$productos->category->name}}" disabled>
                                        </div>
                                        <div class="col-sm-4 form-group mb-4">
                                            <label>Marca</label>
                                        <input class="form-control form-control-solid" type="text" placeholder="" value="{{$productos->brand->name}}" disabled>
                                        </div>
                                        <div class="col-sm-4 form-group mb-4">
                                                <label>Stock</label>
                                        <input class="form-control form-control-solid" type="text" placeholder="" value="{{$productos->stock}}" disabled>
                                            </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 form-group mb-4">
                                            <label>Puntos</label>
                                        <input class="form-control form-control-solid" type="text" value="{{$productos->points}}" disabled>
                                        </div>
                                        <div class="col-sm-4 form-group mb-4">
                                            <label>Precio Puntos</label>
                                            <input class="form-control form-control-solid" type="text" value="{{$productos->points_price}}" disabled>
                                        </div>
                                        <div class="col-sm-4 form-group mb-4">
                                            <label>Últimos Puntos</label>
                                            <input class="form-control form-control-solid" type="text" value="{{$productos->last_points}}" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                            <div class="col-sm-4 form-group mb-4">
                                                <label>Precio</label>
                                            <input class="form-control form-control-solid" type="text" value="{{$productos->price}}" disabled>
                                            </div>
                                            <div class="col-sm-4 form-group mb-4">
                                                <label>Valor Real</label>
                                                <input class="form-control form-control-solid" type="text" value="{{$productos->real_value}}" disabled>
                                            </div>
                                            <div class="col-sm-4 form-group mb-4">
                                                <label>Sku</label>
                                                <input class="form-control form-control-solid" type="text" value="{{$productos->sku}}" disabled>
                                            </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-sm-6 form-group mb-4">
                                            <label for="">¿Es licor?</label>
                                         @if($productos->es_licor == 1)
                                            <input class="form-control form-control-solid" type="text" value="SI" disabled>
                                        @else
                                          <input class="form-control form-control-solid" type="text" value="NO" disabled>
                                        @endif
                                        </div>

                                        <div class="col-sm-6 form-group mb-4">
                                                <label>Tags</label>
                                            <input class="tagsinput form-control form-control-solid" type="text" value="{{$productos->tags}}" disabled>
                                        </div>

                                    </div>

                                    <div class="form-group mb-4">
                                        <label>Descripción</label>
                                    <textarea class="form-control form-control-solid" rows="4" disabled>{{$productos->description}}</textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
<div class="page-content fade-in-up">
	<div class="row">

        <div class="col-md-6">
        	<div class="ibox ibox-fullheight">
        	<div class="ibox-head">
                                <div class="ibox-title">Comentarios de Productos</div>
                            </div>
                            <div class="inbox-body" id="body_comentarios">
                                @foreach($productos->comentarios as $item)

                            	<div class="alert alert-dismissable fade show alert-outline">
                        <li class="media align-items-center">
                            <a class="media-img mr-3" href="#">
                                <img class="img-circle" src="https://www.aprendemarketingonline.com/wp-content/uploads/2017/04/icono-redondo-azul-de-url.png" alt="image" width="54">
                            </a>
                            <div class="media-body d-flex align-items-center">
                                <div class="flex-1">
                                    <div class="media-heading">{{$item->user->name}} <span class="text-muted" style="font-size:12px; padding-left:5px;">{{$item->created_at}}</span> </div>
                                    <div>
                                        <div style="display:inline-block">
                                            <p class="text-muted" style="white-space: pre-line; word-break: break-all;">
                                                {{$item->contenido}}</p>
                                        </div>
                                        <div style="display:inline-block">
                                                @if($item->state==1)
                                                <button  class="btn btn-success"  data-toggle="modal" onclick="resolverData({{$item->id}})" data-target="#resolver">Resolver</button>
                                                @else
                                                <button style="display: none;" class="btn btn-success" type="submit" id="resuelto" >Resolver</button>
                                                    @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </li>
                    </div>
                    @endforeach
            </div>
        </div>
	</div>
</div>

      <!-- Modal -->
      <div class="modal fade" id="resolver" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Actualizar</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="alerta" id="resolverForm" method="post" action="">
                @csrf

            <div class="modal-body">
            <p>¿Está seguro de actualizar el estado del comentario?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
            <button type="submit" class="btn btn-primary" onclick="formSubmit()">SI</button>
            </div>
        </form>
          </div>
        </div>
      </div>


@endsection

<script src="{{asset('assets/vendors/jquery/dist/jquery.js')}}"></script>

<script type="text/javascript">
    function resolverData(id)
    {
        var url = "{{url('/socios/producto/update_status/eraza')}}";
        url = url.replace('eraza', id);
        $("#resolverForm").attr('action', url);
    }
    function formSubmit()
    {
        $("#resolverForm").submit();
    }
 </script>
