<?php

namespace App\Http\Controllers\Scotiabank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\Brand;
use Validator;

class StoreController extends Controller
{
    public function listStore(){
    	$store = Store::get();
    	return view('scotiabank/stores/listado_store',compact('store'));
    }

    public function showStore($id){
    	$show_store = Store::where('id',$id)->first();
    	$store_brand = $show_store->brand_id; 
    	$brand = Brand::get();
    	return view('scotiabank/stores/detalle_store',compact('show_store','brand','store_brand'));

    }

    public function deleteStore($id){
    	$delete_store = Store::where('id',$id)->delete();
    	return redirect()->action('Scotiabank\StoreController@listStore'); 
    }

    public function updateStore(Request $request, $id){
    	$validator = Validator::make($request->all(), [
        'name'    => 'required|string',
        'address'     =>   'required|string',
        'contact'       => 'required|string',
        'latitude'   =>    'required|string',
        'longitude'            => 'required|string',
        'brand_id'         => 'required|string',
        ]);


        if ($validator->fails()) {
            return back()->with('msj','Validar corréctamente los datos')
                        ->withErrors($validator)
                        ->withInput();
        }

        $update_store = Store::where('id',$id)->first();
        $update_store->update($request->all());
        return back()->with('msj', 'Marca actualizada exitosamente con imagen');
    }

    public function eventCancelStore(){
    	return back();
    }
}
