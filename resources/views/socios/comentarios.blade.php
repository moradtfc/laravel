@extends('socios.layout.app')

@section('head')
<link href="{{ URL::asset('assets/vendors/dataTables/datatables.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
 <div class="page-heading">
                <h1 class="page-title">Comentarios</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                         <a href="{{url('/socios/dashboard')}}"><i class="la la-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">Comentarios</li>
                    <li class="breadcrumb-item">Todos</li>
                </ol>
</div>


<div class="container">
    <div class="page-content fade-in-up" style="margin-top: 20px;">
                <div class="ibox">
                    <div class="ibox-body">
                        <h5 class="font-strong mb-4">Comentarios</h5>
                        <div class="flexbox mb-4">
                            <div class="input-group-icon input-group-icon-left mr-3">
                                <span class="input-icon input-icon-right font-16"><i class="ti-search"></i></span>
                                <input class="form-control form-control-rounded form-control-solid" id="key-search" type="text" placeholder="Buscar ...">
                            </div>
                        </div>
                        <div class="table-responsive row">
                            <table class="table table-bordered table-hover" id="datatable">
                                <thead class="thead-default thead-lg">
                                    <tr>
                                        <th>#</th>
                                        <th>Comentario</th>
                                        <th>Status</th>
                                        <th>Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>

                                        @foreach($comentarios as $item)
                                    <tr >
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->contenido}}</td>
                                        <td> @if($item->state==1)
                                            <span class="badge badge-primary badge-pill">Pendiente</span>
                                                @else
                                                <span class="badge badge-success badge-pill">Actualizado</span>
                                                @endif</td>
                                        <td >{{$item->created_at}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

</div>
@endsection

@section('bottom-scripts')
 <script src="{{ URL::asset('assets/vendors/dataTables/datatables.min.js') }}"></script>
 <script>
        $(function() {
            $('#datatable').DataTable({
                pageLength: 10,
                fixedHeader: true,
                responsive: true,
                "sDom": 'rtip',
                "order": [[ 3, "desc" ]],
                columnDefs: [{
                    targets: 'no-sort',
                    orderable: false
                }]
            });

            var table = $('#datatable').DataTable();
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
