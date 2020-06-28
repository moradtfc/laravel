<?php

namespace App\Http\Controllers\Scotiabank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Brand;
use App\Models\User;
use Validator;

class BrandController extends Controller
{
    public function listBrand(){
    	$brand = Brand::get();
    	//return $brand;
    	return view('scotiabank/brand/listado_brand',compact('brand'));
    }

    public function showBrand($id){
    	$users = User::get(); 
    	$brand = Brand::where('id',$id)->first();
    	$brandUserId=$brand->user_id;
    	return view('scotiabank/brand/detalle_brand',compact('brand','users','brandUserId'));
    	//return $brand;
    }

    public function eventCancelBrand(){
    	return back();
    }

    public function updateBrand(Request $request, $id){
    	$validator = Validator::make($request->all(), [
        'name'    => 'required|string',
        'web'     =>   'string|nullable',
        'email'   =>    'string|nullable',
        'photo_url_alt'         => 'string|nullable',
        'active_url'      => 'required|string',
        'photo_url'	=>	'image|nullable',
        'user_id' =>    'required|string',
        ]);
        if ($validator->fails()) {
            return back()->with('msj','Validar corréctamente los datos')
                        ->withErrors($validator)
                        ->withInput();
        }

         $imagen_validator = $request->file('photo_url');

         //return($request);

         if(trim($imagen_validator)!=''){
         $file = $request->file('photo_url');
		$filename = 'brand-photo-'.time().'.'.$file->getClientOriginalExtension();
		$path = "brands/".$filename;
		$saveimg = Storage::disk('s3')->put($path, file_get_contents($file),'public');
		$storagePath=Storage::disk('s3')->url($path);

		$request->merge(['photo_path' => $path]);
		$request->merge(['final_url' => $storagePath]);


        $update_brand = Brand::where('id',$id)->first();
        $update_brand->update($request->all());
        return back()->with('msj', 'Marca actualizada exitosamente con imagen');

        }else {

            $update_brand = Brand::where('id',$id)->first();
            $update_brand->update($request->all());

            return back()->with('msj', 'Marca actualizada exitosamente sin imagen');
        }

    }

    public function deleteBrand($id){
        $delete_brand = Brand::where('id',$id)->delete();
        return redirect()->action('Scotiabank\BrandController@listBrand');
    }

}
