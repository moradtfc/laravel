@extends('admin.layout.app')

@section('head')
<link href="{{ URL::asset('assets/vendors/dataTables/datatables.min.css') }}" rel="stylesheet" />

@endsection

@section('content')


    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Listado usuarios</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                 <a href="{{url('/admin/dashboard')}}"><i class="la la-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">Usuarios</li>
            <li class="breadcrumb-item">Todos</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-body">
                <h5 class="font-strong mb-4">DATATABLE</h5>
                <div class="flexbox mb-4">
                    <div class="flexbox">
                        <label class="mb-0 mr-2">Tipo:</label>
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
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Tipo de Usuario</th>
                                <th class="no-sort"></th>
                            </tr>
                        </thead>
                        <tbody>

                                @foreach($usuarios as $item)
                                      <tr>
                                            <td>{{ $item->id }}</td>
                                             <td>{{ $item->name }}</td>
                                              <td>{{ $item->email }}</td>
                                               <td>
                                                    @if($item->id_rol==2)
                                                    Scotiabank
                                                    @elseif($item->id_rol==3)
                                                    Socio
                                                    @else
                                                    Admin
                                                    @endif

                                               </td>

                                                <td>
                                    <a class="text-muted font-16" href="{{ route('delete-user/',[$item->id]) }}"><i class="ti-trash"></i></a>
                                </td>
                                                   
                                    </tr>
                                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
    <footer class="page-footer">
        <div class="font-13">2018 © <b>Adminca</b> - Save your time, choose the best</div>
        <div>
            <a class="px-3 pl-4" href="http://themeforest.net/item/adminca-responsive-bootstrap-4-3-angular-4-admin-dashboard-template/20912589" target="_blank">Purchase</a>
            <a class="px-3" href="http://admincast.com/adminca/documentation.html" target="_blank">Docs</a>
        </div>
        <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
    </footer>


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
