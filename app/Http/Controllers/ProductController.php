<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Parameter;
use Illuminate\Support\Facades\Storage;
use Validator;

class ProductController extends Controller
{

    public function openProductRegistration(){
    	$brand=Brand::get();
    	$category=Category::get();
    	$parameter=Parameter::first();
    	return view('/admin/products/registro_productos',compact('brand','category','parameter'));
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
        'imgpro'       	=> 'required|image',
        'es_licor'      => 'required|boolean',
        ]);

    	if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $parametro=new Parameter();

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


    public function listProductsAdmin(){
        $productos = Product::get();
        return view('admin/products/listado_productos',compact('productos'));
    }

    public function listProductsFromActiveCatalogue(request $request){
        $parametro=new Parameter();
        $productos=Product::with('category','brand.stores') //Se obtienen todos los productos
        ->ActiveCatalogue($parametro->getActiveCatalogueID()) //Se filtran solo los que pertenezcan al catalogo activo
        ->Active() //SOlo productos activos
        ->FilterCategories($request->categories) //Filtro por categorias, recibe array
        ->minPoints($request->minPoints) //Filtro por puntos
        ->maxPoints($request->maxPoints) //Filtro por puntos
        ->FilterValue($request->minValue,$request->maxValue) //Filtro por precio
        ->Search($request->search) //Se filtra si lo introducido en la busqueda concuerda con marcas, tags o nombre de producto
        ->get();

        $categorias=Category::get();

        //return $productos;

        return response()->json([
    'categorias' => $categorias,
    'productos' => $productos
]);
    }

public function getProductById($id){

        $producto=Product::where('id',$id)->with('category','brand.stores')->first();
        $producto->visit_views=$producto->visit_views+1;
        $producto->save();

        return response()->json($producto);
   }


    public function fichaProducts($id){
        //$productos=Product::where('id',$id)->with('brand','comentarios')->get();
        $productos=Product::where('id',$id)->with('brand','comentarios.user')->first();
        //dd($productos);
        return view('/admin/products/ficha_productos',compact('productos'));
    }


}
