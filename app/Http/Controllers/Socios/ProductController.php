<?php

namespace App\Http\Controllers\Socios;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Parameter;
use App\Models\User;
use App\Models\CommentsStore;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function listProducts(){
        $parametro=new Parameter();
        $id = Auth::user()->id;

        $user=User::where('id',$id)->with('brands.products')->first();

        $brands=Brand::where('user_id',$id)->pluck('id')->toArray();

        $brandsName=Brand::where('user_id',$id)->get();

        $productos=Product::whereIn('brand_id',$brands)                 //Obtenemos los productos del catalogo activo
        ->withCount('comentarios')
        ->ActiveCatalogue($parametro->getActiveCatalogueID())
        ->get();


        return view('/socios/producto/listado_productos',compact('productos','brandsName'));

    }

     public function listStagingProducts(){

        $parametro=new Parameter();
        $id = Auth::user()->id;

        $user=User::where('id',$id)->with('brands.products')->first();

        $brands=Brand::where('user_id',$id)->pluck('id')->toArray();

        $brandsName=Brand::where('user_id',$id)->get();

        $productos=Product::whereIn('brand_id',$brands)                //Obtenemos los productos del catalogo en staging
        ->withCount('comentarios')
        ->StagingCatalogue($parametro->getStagingCatalogueID())
        ->get();

      return view('/socios/producto/listado_productos_staging',compact('productos','brandsName'));

    }

    public function detailProduct($id){
    	//$productos=Product::where('id',$id)->with('brand','comentarios')->get();
    	$productos=Product::where('id',$id)->with('brand','comentarios.user')->first();
    	//dd($productos);
    	return view('/socios/producto/detalle_producto',compact('productos'));
    	//return $productos->brand;
    }

      //Controlador Para Marcas

       public function listBrands(){
        $id = Auth::user()->id;

        $user=User::where('id',$id)->first();

        $brands=Brand::where('user_id',$id)->get();
        return view('/socios/listado_marcas',compact('brands'));

    }

     public function brandDetail($id){

        $brand=Brand::where('id',$id)->with('stores','commentStore.user')->first();
        return view('/socios/detalle_marca',compact('brand'));

    }


}
