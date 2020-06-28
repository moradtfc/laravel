@extends('scotiabank.layout.app')

@section('head')
<link href="{{URL::asset('assets/vendors/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
@endsection

@section('content')

  <div class="page-heading">
                <h1 class="page-title">Productos</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                         <a href="{{url('/admin/dashboard')}}"><i class="la la-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">Productos</li>
                    <li class="breadcrumb-item">Agregar nuevo</li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-10">
                        <div class="ibox ibox-fullheight">
                            <div class="ibox-head">
                                <div class="ibox-title">Agregar producto</div>
                            </div>
                            <form class="form-info" enctype="multipart/form-data" action="{{ url('/scotiabank/registrar_productos') }}" method="post">
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
                                            <label>Nombre del Producto</label>
                                            <input class="form-control" name="name" type="text" placeholder="Ingresa nombre de producto" required>
                                        </div>
                                        <div class="col-sm-4 form-group mb-4">
                                            <label>Puntos (puntos + tarjeta)</label>
                                            <input class="form-control" name="points_price" type="text" placeholder="0" required>
                                        </div>
                                         <div class="col-sm-4 form-group mb-4">
                                            <label>Tarjeta (puntos + tarjeta)</label>
                                            <input class="form-control" type="text" placeholder="0,00" name="price" required="">
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-sm-4 form-group mb-4">
                                            <label>Valor total en puntos</label>
                                            <input class="form-control" name="points" type="text" placeholder="0" required>
                                        </div>
                                        <div class="col-sm-4 form-group mb-4">
                                            <label>Antes</label>
                                            <input class="form-control" name="last_points" type="text" placeholder="0" required>
                                        </div>
                                         <div class="col-sm-4 form-group mb-4">
                                            <label>Valor Real</label>
                                            <input class="form-control" type="text" placeholder="0" name="real_value" required="">
                                        </div>
                                    </div>

                                      <div class="row">
                                        <div class="col-sm-4 form-group mb-4">
                                            <label>Etiquetas (separar con comas/sin espacios)</label>
                                            <input class="form-control" name="tags" type="text" placeholder="Etiqueta1,Etiqueta2" required>
                                        </div>
                                        <div class="col-sm-4 form-group mb-4">
                                            <label>SKU - Código de Producto</label>
                                            <input class="form-control tagsinput" data-role="tagsinput" name="sku" type="text" placeholder="6008, 6009" minlength="4" required>
                                        </div>

                                         <div class="col-sm-4 form-group mb-4">
                                            <label>Stock</label>
                                            <input class="form-control" name="stock" type="text" placeholder="Stock" required>
                                        </div>

                                    </div>

                                     <div class="row">
                                        <div class="col-sm-6 form-group mb-6">
                                            <label>Categoria</label>
                                             <select class="form-control select2_demo_1" name="category_id">
                                             	<option value="">Selecciona una categoria</option>
                                            	@foreach($category as $item)
                                            	<option value="{{$item->id}}">{{$item->name}}</option>
                                            	@endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-6 form-group mb-6">
                                            <label>Marca</label>
                                             <select class="form-control select2_demo_1" name="brand_id">
                                             	<option value="">Selecciona una marca</option>
                                            	@foreach($brand as $item)
                                            	<option value="{{$item->id}}">{{$item->name}}</option>
                                            	@endforeach
                                            </select>
                                        </div>

                                    </div>


                                    <div class="form-group mb-4">
                                        <label>Detalle de Producto</label>
                                        <textarea class="form-control form-control-solid" name="description" rows="4" placeholder="Descripción"></textarea>
                                    </div>




                                    <div class="row">
                                        <div class="col-sm-6 form-group mb-6">
                                             <label class="btn btn-info file-input mr-2">
                                        <span class="btn-icon"><i class="la la-upload"></i>Imagen</span>
                                        <input type="file" name="imgpro">
                                    </label>
                                        </div>

                                     <!--    <div class="col-sm-6 form-group mb-6">
                                        	Disponible
                                             <label class="ui-switch switch-icon switch-large">
                                            <input type="checkbox" id="product_act" value="0" name="status">
                                            <span></span>
                                        </label>
                                        </div> -->

                                          <div class="form-group mb-0">
                <label>Disponibilidad</label>
                <div class="mt-1">

                    <label class="radio radio-inline radio-grey radio-primary">
                        <input type="radio" name="state" value="1" checked required="">
                        <span class="input-span"></span>Disponible</label>
                    <label class="radio radio-inline radio-grey radio-primary">
                        <input type="radio" name="state" value="0" required="">
                        <span class="input-span"></span>No Disponible</label>
                        <label class="radio radio-inline radio-grey radio-primary">
                </div>
                <span class="help-block">Seleccione uno de los tipos de cuenta.</span>
            </div>

                                    </div>

                                </div>
                                <div class="ibox-footer">
                                    <button class="btn btn-info mr-2" type="submit">Registrar producto</button>
                                    <button class="btn btn-secondary" type="reset">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection

@section('bottom-scripts')
<script src="{{URL::asset('assets/vendors/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{URL::asset('assets/vendors/select2/dist/js/select2.full.min.js')}}"></script>
<script type="text/javascript">

    $('#product_act').val(false);
    console.log($('#product_act').val());

    $(function(){
        $('#product_act').click(function(){
            var valor = $(this).prop('checked');
            console.log(valor);

            switch(valor){
                case true:
                    $(this).val(true);
                    console.log($('#product_act').val());
                break;

                case false:
                    $(this).val(false);
                    console.log($('#product_act').val());
                break;

                default:
                    $(this).val(false);
                    console.log($('#product_act').val());
                break;
            }

        });

            $('.select2_demo_1').select2();


    });
</script>
@endsection
