@extends('admin.layout.app')

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
                    <li class="breadcrumb-item">Marca</li>
                    <li class="breadcrumb-item">Perfil</li>
                </ol>
</div>



            <div class="page-content fade-in-up">
                <div class="ibox">
					<div class="ibox-body">
                        <div class="flexbox">
                            <div class="flexbox-b">
                                <div class="ml-0 mr-5">
                                    <img class="img-circle" src="{{$brand[0]->final_url}}" alt="image" width="110">
                                </div>
                                <div>
                                    <h4>{{$brand[0]->name}}</h4>
                                    <div class="text-muted font-13 mb-3">
                                        <a target="_blank"><span class="mr-3"><i class="ti-location-pin mr-2"></i></span>{{$brand[0]->web}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                        <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-body">
                        <h5 class="font-strong mb-4">Marcas</h5>
                        <div class="flexbox mb-4">
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
                                        <th>Dirección</th>
                                        <th>Latitud</th>
                                        <th>Longitud</th>
                                        <!--<th class="no-sort"></th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($brand[0]->stores as $item)
                                	<tr>
                                	<td>{{$item->id}}</td>
                                	<td>{{$item->name}}</td>
                                	<td>{{$item->address}}</td>
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
@endsection