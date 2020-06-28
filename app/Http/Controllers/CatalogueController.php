<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Catalog;
use Validator;


class CatalogueController extends Controller
{
    public function openCatalogue(){
        return view('/admin/catalogos/registro_catalogo');
    }



public function addCatalogue(request $request){

    $validator = Validator::make($request->all(), [
        'name' => 'required|string',
        'status' => 'required|string',
        'url' => 'url|nullable',
        'soles_symbol' => 'string|nullable',
        'dollar_symbol' => 'string|nullable',

    ]);

    if($validator->fails()){
        return back()
          ->withErrors($validator)
          ->withInput();
    }

    $catalogo = Catalog::create($request->all());

    return back()->with('msj', 'Datos registrados exitosamente');
 }

    public function listCatalogue(){
        $catalog = Catalog::get();
        return view('admin/catalogos/listado_catalogo',compact('catalog'));
    }

     public function deleteCatalogue($id){
        
        $catalogo= Catalog::find($id);

                    $catalogo->delete();
                                

        return back()->with('msj', 'Catalogo eliminado exitosamente');
    }

}