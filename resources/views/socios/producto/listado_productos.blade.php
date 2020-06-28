@extends('socios.layout.app')

@section('head')
<link href="{{ URL::asset('assets/vendors/dataTables/datatables.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
 <div class="page-heading">
                <h1 class="page-title">Productos Activos</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                         <a href="{{url('/socios/dashboard')}}"><i class="la la-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">Productos</li>
                    <li class="breadcrumb-item">Listado</li>
                </ol>
</div>
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-body">
                        <div class="flexbox mb-4">
                            <div class="flexbox">
                                <label class="mb-0 mr-2">Por:</label>
                                <select class="selectpicker show-tick form-control" id="type-filter" title="Seleccione" data-style="btn-solid" data-width="150px">
                                    <option value="">Todos</option>
                                    @foreach($brandsName as $item)
                                    <option value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group-icon input-group-icon-left mr-3">
                                <span class="input-icon input-icon-right font-16"><i class="ti-search"></i></span>
                                <input class="form-control form-control-rounded form-control-solid" id="key-search" type="text" placeholder="Buscar ...">
                            </div>
                        </div>
                        <div class="table-responsive row">
                            <table class="table table-bordered table-hover" id="datatablex">
                                <thead class="thead-default thead-lg">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Imagen</th>
                                        <th>Marca</th>
                                        <th>Puntos</th>
                                        <th>Precio Puntos</th>
                                        <th>Precio</th>
                                        <th>Estado</th>
                                        <th class="no-sort">Ver</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($productos as $item)
                                      <tr>
										   	<td><a href="{{url('/socios/producto/detalle_producto/'.$item->id)}}">{{ $item->name }} </a></td>
                                               <td><img src="{{$item->final_url}}" width="90px" height="auto"></td>
                                               <td>{{$item->brand->name}}</td>
                                               <td>{{$item->points}}</td>
                                               <td>{{$item->points_price}}</td>
                                               <td>{{$item->price}}</td>
                                               <td>
                                                @if($item->comentarios_count>0)
                                                <span class="badge badge-primary badge-pill">Pendiente</span>
                                                    @else
                                                    <span class="badge badge-success badge-pill">Completado</span>
                                                    @endif
                                            </td>
                                            <td><a href="{{url('/socios/producto/detalle_producto/'.$item->id)}}"><i class="ti-eye"></i></a></td>


									</tr>
										   @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@section('bottom-scripts')
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
                table.column(2).search($(this).val()).draw();
            });
        });
    </script>
@endsection
