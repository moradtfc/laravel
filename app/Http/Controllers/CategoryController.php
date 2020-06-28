<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use Validator;

class CategoryController extends Controller
{
    public function openCategory(){
    	return view('/admin/categorias/registro_categoria');
    }

    public function addCategory(request $request){
    	// Validamos que todos los valores esten correctos
    	$validator = Validator::make($request->all(), [
        'name'    => 'required|string',
        'color_code'    => 'required|string|max:20',
        'order'  => 'string|max:25|nullable',
        'description'            => 'string|max:250|nullable',
        'pdf_url'         => 'required|url',
        'icon_url_alternative'              => 'string|nullable',
       // 'active_url'      => 'required|string',
        'imgcat'     => 'required|image',
        ]);

      if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $file = $request->file('imgcat');
		$filename = 'category-photo-' . time() . '.' . $file->getClientOriginalExtension();
		$path = "categories/".$filename;
		$saveimg = Storage::disk('s3')->put($path, file_get_contents($file),'public');
		$storagePath=Storage::disk('s3')->url($path);

		if($request->imgadd){
		$file2 = $request->file('imgadd');
		$filename2 = 'category-photo-' . time() . '.' . $file->getClientOriginalExtension();
		$path2 = "categories/".$filename2;
		$saveimg = Storage::disk('s3')->put($path2, file_get_contents($file2),'public');
		$storagePath2=Storage::disk('s3')->url($path2);
							}

		$request->merge(['icon_path' => $path]);
		$request->merge(['icon_url' => $storagePath]);

		$categoria=Category::create($request->all());


return back()->with('msj', 'Datos registrados exitosamente');
    }


     public function listCategories(){
        $categories=Category::get();
        return view('/admin/categorias/listado_categorias',compact('categories'));
    }

}
