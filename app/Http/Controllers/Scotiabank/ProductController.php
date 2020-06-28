<?php

namespace App\Http\Controllers\Scotiabank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use App\Models\User;
use App\Models\Category;
use App\Models\Parameter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Validator;

class ProductController extends Controller
{

    public function openProductRegistration(){
    	$brand=Brand::get();
    	$category=Category::get();
    	$parameter=Parameter::first();
    	return view('/scotiabank/producto/registro_producto',compact('brand','category','parameter'));
    }

      public function addProduct(request $request){
    	$validator = Validator::make($request->all(), [
        'name'    			=> 'required|string',
        'points_price'     	=> 'required|string',
        'price'  			=> 'required|string',
        'points'            => 'required|string',
        'last_points'       => 'required|string',
        'real_value'        => 'required|string',
        'tags'       		=> 'required|string',
        'sku'       		=> 'required|string',
        'stock'       		=> 'required|string',
        'category_id'       => 'required',
        'brand_id'       	=> 'required',
        'description'       => 'required|string',
        'imgpro'       	=> 'image',
        ]);

    	if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $parametro=new Parameter();

        $imagen_validator = $request->file('imgpro');

        if(trim($imagen_validator) != ''){
  		$file = $request->file('imgpro');
		$filename = 'product-photo-' . time() . '.' . $file->getClientOriginalExtension();
		$path = "products/".$filename;
		$saveimg = Storage::disk('s3')->put($path, file_get_contents($file),'public');
		$storagePath=Storage::disk('s3')->url($path);

		$request->merge(['photo_path' => $path]);
		$request->merge(['final_url' => $storagePath]);
        $request->merge(['catalogue_id' => $parametro->getActiveCatalogueID()]);

        Product::create($request->all());
        return back()->with('msj', 'Producto registrado exitosamente');
        }
        else{
        $request->merge(['catalogue_id' => $parametro->getActiveCatalogueID()]);
        Product::create($request->all());
        return back()->with('msj', 'Producto registrado exitosamente');
        }


    }


    public function listProducts(){
        $parametro=new Parameter();
        $brandsName=Brand::get();
        $productos=Product::with('category','brand.stores')                //Obtenemos los productos del catalogo activo
        ->withCount('comentarios')
        ->ActiveCatalogue($parametro->getActiveCatalogueID())
        ->get();

        return view('/scotiabank/producto/listado_productos',compact('productos','brandsName'));
    }

     public function listStagingProducts(){

        $parametro=new Parameter();

        $brandsName=Brand::get();

        $productos=Product::with('category','brand.stores')                //Obtenemos los productos del catalogo en staging
        ->withCount('comentarios')
        ->StagingCatalogue($parametro->getStagingCatalogueID())
        ->get();

      return view('/scotiabank/producto/listado_productos_staging',compact('productos','brandsName'));

    }

    public function getProductById($id){
        $producto=Product::where('id',$id)->with('category','brand.stores')->first();
        return response()->json($producto);
   }

    public function detailProduct($id){
    	//$productos=Product::where('id',$id)->with('brand','comentarios')->get();
    	$productos=Product::where('id',$id)->with('brand','comentarios.user')->first();
    	//dd($productos);
    	return view('/scotiabank/producto/detalle_producto',compact('productos'));
    	//return $productos->brand;
    }

    public function updateProduct(request $request, $id){
        $validator = Validator::make($request->all(), [
        'name'    			=> 'required|string',
        'points_price'     	=> 'required|string',
        'price'  			=> 'required|string',
        'points'            => 'required|string',
        'last_points'       => 'required|string',
        'real_value'        => 'required|string',
        'tags'       		=> 'required|string',
        'sku'       		=> 'required|string',
        'stock'       		=> 'required|string',
        'category_id'       => 'required',
        'brand_id'       	=> 'required',
        'description'       => 'required|string',
        'imgpro'       	=> 'image',
        ]);

        if ($validator->fails()) {
            return back()->with('msj','Validar corréctamente los datos')
                        ->withErrors($validator)
                        ->withInput();
        }

        $imagen_validator = $request->file('imgpro');

        if(trim($imagen_validator) != ''){
          $file = $request->file('imgpro');
          $filename = 'product-photo-' . time() . '.' . $file->getClientOriginalExtension();
          $path = "products/".$filename;
          $saveimg = Storage::disk('s3')->put($path, file_get_contents($file),'public');
          $storagePath=Storage::disk('s3')->url($path);

          $request->merge(['photo_path' => $path]);
          $request->merge(['final_url' => $storagePath]);
          $request->merge(['catalogue_id' => $parametro->getActiveCatalogueID()]);

          $update_product = Product::where('id', $id)->first();

          dd($update_product);
          //$update_product->update($request->all());

          }
          else{
          $request->merge(['catalogue_id' => $parametro->getActiveCatalogueID()]);
          $update_product = Product::where('id', $id)->first();

          }
    }
}
