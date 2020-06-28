<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Store;
use App\Models\Brand;
use Validator;

class StoreController extends Controller
{
    public function openStore(){
    	$brand=Brand::get();
    	return view('/admin/stores/registro_stores',compact('brand'));
    }

    public function addStore(request $request){
    	$validator = Validator::make($request->all(), [
        'name'    => 'required|string',
        'address'     =>   'required|string',
        'contact'       => 'required|string',
        'latitude'   =>    'required|string',
        'longitude'            => 'required|string',
        'brand_id'         => 'required|string',
        ]);

    	if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $store=Store::create($request->all());

        return back()->with('msj', 'Datos registrados exitosamente');
    }

    public function listStore(){
    	$store = Store::with('brands')->get();
        //return $store;
    	return view('/admin/stores/listado_stores',compact('store'));
    }
}
