@extends('scotiabank.layout.app')
@section('head')
<link href="{{ URL::asset('assets/vendors/dataTables/datatables.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
 <div class="page-heading">
                <h1 class="page-title">Store</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">Tiendas</li>
                    <li class="breadcrumb-item">Todas</li>
                </ol>
</div>


		<div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-body">
                        <h5 class="font-strong mb-4">Marcas</h5>
                        <div class="flexbox mb-4">
                            <div class="flexbox">
                                <label class="mb-0 mr-2">Type:</label>
                                <select class="selectpicker show-tick form-control" id="type-filter" title="Please select" data-style="btn-solid" data-width="150px">
                                    <option value="">All</option>
                                    <option>Shipped</option>
                                    <option>Completed</option>
                                    <option>Pending</option>
                                    <option>Canceled</option>
                                </select>
                            </div>
                            <div class="input-group-icon input-group-icon-left mr-3">
                                <span class="input-icon input-icon-right font-16"><i class="ti-search"></i></span>
                                <input class="form-control form-control-rounded form-control-solid" id="key-search" type="text" placeholder="Search ...">
                            </div>
                        </div>
                        <div class="table-responsive row">
                            <table class="table table-bordered table-hover" id="datatable">
                                <thead class="thead-default thead-lg">
                                    <tr>
                                        <th>#</th>
                                        <th>Tienda</th>
                                        <th>Marca</th>
                                        <th>Direccion</th>
                                        <th>Latitud</th>
                                        <th>Longitud</th>
                                        <th class="no-sort">Ver</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($store as $item)
                                      <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->brands->name }}</td>
                                            <td>{{ $item->address }}</td>
                                             <td>{{ $item->latitude }}</td>
                                              <td>{{ $item->longitude }}</td>
                                            <td><a href="{{url('scotiabank/detalle_store/'.$item->id)}}" class="text-muted font-16" href=""><i class="ti-eye"></i></a></td>
                                          
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
 <script src="./assets/vendors/dataTables/datatables.min.js"></script>
 <script>
        $(function() {
            $('#datatable').DataTable({
                pageLength: 10,
                fixedHeader: true,
                responsive: true,
                "sDom": 'rtip',
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
                table.column(4).search($(this).val()).draw();
            });
        });
    </script>
@endsection