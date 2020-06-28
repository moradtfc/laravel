<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
//use Illuminate\Support\Facades\DB;
use App\Models\Brand;
use App\Models\Store;
use App\Models\User;
use Validator;
class BrandController extends Controller
{
   public function openBrand(){
        $users=User::where('id_rol',3)->get();
    	return view('/admin/brand/registro_brand',compact('users'));
    }

    public function addBrand(request $request){
    	$validator = Validator::make($request->all(), [
        'name'    => 'required|string',
        'web'     =>   'string|nullable',
        'email'   =>    'string|nullable',
        'photo_url_alt'         => 'string|nullable',
        'active_url'      => 'required|string',
        'photo_url'     => 'required|image',
        ]);

    	if ($validator->fails()) {
            return back()->with('msj','Validar corréctamente los datos')
                        ->withErrors($validator)
                        ->withInput();
        }

        $file = $request->file('photo_url');
		$filename = 'brand-photo-' . time() . '.' . $file->getClientOriginalExtension();
		$path = "brands/".$filename;
		$saveimg = Storage::disk('s3')->put($path, file_get_contents($file),'public');
		$storagePath=Storage::disk('s3')->url($path);

		$request->merge(['photo_path' => $path]);
		$request->merge(['final_url' => $storagePath]);

				$brand=Brand::create($request->all());


		return back()->with('msj', 'Datos registrados exitosamente');

    }

    public function listBrand(){
        $brand=Brand::get();
        return view('/admin/brand/listado_brand',compact('brand'));
    }

    public function profileBrand($id){
        $brand = Brand::where('id',$id)->with('stores')->get();
        //$brand_stores = Store::with('brands')->where('brand_id',$id)->get();
        //return $brand;
        return view('/admin/brand/perfil_brand',compact('brand'));
    }

}
