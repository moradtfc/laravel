@extends('socios.layout.app')

@section('head')
<link href="{{ URL::asset('assets/vendors/dataTables/datatables.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
 <div class="page-heading">
                <h1 class="page-title">Marca</h1>
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
                <h5 class="font-strong mb-5">Ficha de Marca</h5>
                <div class="row">
                    <div class="col-lg-4">
                        <div>
                        <img src="{{$brand->final_url}}" alt="image" />
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <form action="javascript:;">
                            <div class="form-group mb-4">
                                <label>Nombre</label>
                            <input class="form-control form-control-solid" type="text" placeholder="" value="{{$brand->name}}" disabled>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group mb-6">
                                    <label>Web</label>
                                <input class="form-control form-control-solid" type="text" value="{{$brand->web}}" disabled>
                                </div>
                                <div class="col-sm-6 form-group mb-6">
                                    <label>Email</label>
                                <input class="form-control form-control-solid" type="text" placeholder="" value="{{$brand->email}}" disabled>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>


                  <div class="table-responsive row" style="margin-top: 20px;">
                     <h5 class="font-strong">Tiendas</h5>
                            <table class="table table-bordered table-hover" id="datatablex">
                                <thead class="thead-default thead-lg">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Dirección</th>
                                        <th>Contacto</th>
                                        <th>Latitud</th>
                                        <th>Longitud</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($brand->stores as $item)
                                      <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{$item->contact}}</td>
                                            <td>{{$item->latitude}}</td>
                                            <td>{{$item->longitude}}</td>

                                    </tr>
                                           @endforeach
                                </tbody>
                            </table>
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
                                <div class="ibox-title">Escribir comentario</div>
                            </div>
                            <form class="form-info" enctype="multipart/form-data" action="{{url('/socios/marcas/comentar_tienda')}}" method="post">
                                {{ csrf_field() }}
                                <div class="ibox-body">

                                    <div class="row">
                                    	<div class="col-sm-10 form-group mb-4">
                                            <label>Comentarios</label>
                                            <textarea class="form-control form-control-solid" name="contenido" placeholder="Ingresa"  required=""></textarea>
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <input type="hidden" name="brand_id" value="{{$brand->id}}">
                                            <input type="hidden" name="state" value="1">
                                        </div>
                                    </div>

                                </div>
                                <div class="ibox-footer">
                                    <button class="btn btn-info mr-2" type="submit">Enviar</button>
                                    <button class="btn btn-secondary" type="reset">Cancelar</button>
                                </div>
                            </form>
                        </div>
        </div>

        <div class="col-md-6">
        	<div class="ibox ibox-fullheight" style="overflow-y:scroll;height:350px !important;">
        	<div class="ibox-head">
                                <div class="ibox-title">Comentarios de Tienda</div>
                            </div>
                            <div class="inbox-body">
                                @foreach($brand->commentStore as $item)

                            	<div class="alert alert-dismissable fade show alert-outline">
                        <li class="media align-items-center">
                                @if(Auth::user()->id_rol==2)
                                <a class="media-img mr-3" href="#">
                                   <img class="img-circle" src="{{ URL::asset('assets/img/users/scotiabank.jpg') }}" alt="image" width="54">
                               </a>
                           @else
                               <a class="media-img mr-3" href="#">
                                   <img class="img-circle" src="{{ URL::asset('assets/img/users/partner.png') }}" alt="image" width="54">
                               </a>
                               @endif
                            <div class="media-body d-flex align-items-center">
                                <div class="flex-1">
                                    <div class="media-heading">{{$item->user->name}} <span class="text-muted" style="font-size:12px; padding-left:5px;">{{$item->created_at}}</span> <span>
                                        @if($item->state==1)
                                        <span class="badge badge-primary badge-pill">Pendiente</span>
                                            @else
                                            <span class="badge badge-success badge-pill">Actualizado</span>
                                            @endif
                                    </span> </div>
                                            <p class="text-muted" style="white-space: pre-line; word-break: break-all;">
                                                {{$item->contenido}}</p>


                                    @if($item->user->id_rol == 3)
                                    <a style="background:#2cc4cb;color:#ffffff;padding:8px;border-radius:3px" data-toggle="modal" data-target="#resolver" onclick="resolverData({{$item->id}})" >Finalizar</a>
                                    @endif
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
              <h5 class="modal-title">Finalizar</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="alerta" id="resolverForm" method="post" action="">
                @csrf

            <div class="modal-body">
            <p>¿Está conforme con la actualización?</p>
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

@section('bottom-scripts')
<script src="{{asset('assets/vendors/jquery/dist/jquery.js')}}"></script>
 <script src="{{ URL::asset('assets/vendors/dataTables/datatables.min.js') }}"></script>
 <script>
        $(function() {
            $('#datatablex').DataTable({
                pageLength: 10,
                fixedHeader: true,
                responsive: true,
                "sDom": 'rtip',
                columnDefs: [{
                    targets: 'no-sort',
                    orderable: false
                }]
            });

            var table = $('#datatablex').DataTable();
            $('#key-search').on('keyup', function() {
                table.search(this.value).draw();
            });
            $('#type-filter').on('change', function() {
                // SI SE VA AGREGAR OTRA COLUMNA, TENER CUIDADO CON EL NUMERO DE LA COLUMNA A INGRESAR
                table.column(0).search($(this).val()).draw();
            });
        });
    </script>

    <script type="text/javascript">
    function resolverData(id)
    {
        var url = "{{url('/borrar-comentario-store/eraza')}}";
        url = url.replace('eraza', id);
        $("#resolverForm").attr('action', url);
    }
    function formSubmit()
    {
        $("#resolverForm").submit();
    }
 </script>
@endsection




