<?php

namespace App\Http\Controllers\Scotiabank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use Validator;

class CategoryController extends Controller
{
    public function listCategory(){
    	$categories=Category::get();
        return view('/scotiabank/categorias/listado_categorias',compact('categories'));
    }

    public function showCategory($id){
    	$showCat = Category::where('id',$id)->first();
    	return view('/scotiabank/categorias/detalle_categoria', compact('showCat'));
    	//return $showCat;
    }

    public function updateCategory(request $request ,$id){
    	$validator = Validator::make($request->all(), [
        'name'    => 'required|string',
        'color_code'    => 'required|string|max:20',
        'order'  => 'string|max:25|nullable',
        'description'            => 'string|max:250|nullable',
        'pdf_url'         => 'required|url',
        'icon_url_alternative'              => 'string|nullable',
       // 'active_url'      => 'required|string',
        'imgcat'     => 'image',
        ]);

      if ($validator->fails()) {
            return back()->with('msj','Validar corréctamente los datos')
                        ->withErrors($validator)
                        ->withInput();
        }

        $imagen_validator = $request->file('imgcat');

        if(trim($imagen_validator) != ''){
        $file = $request->file('imgcat');
		$filename = 'category-photo-' . time() . '.' . $file->getClientOriginalExtension();
		$path = "categories/".$filename;
		$saveimg = Storage::disk('s3')->put($path, file_get_contents($file),'public');
		$storagePath=Storage::disk('s3')->url($path);

		/*if($request->imgadd){
		$file2 = $request->file('imgadd');
		$filename2 = 'category-photo-' . time() . '.' . $file->getClientOriginalExtension();
		$path2 = "categories/".$filename2;
		$saveimg = Storage::disk('s3')->put($path2, file_get_contents($file2),'public');
		$storagePath2=Storage::disk('s3')->url($path2);
        }*/

		$request->merge(['icon_path' => $path]);
		$request->merge(['icon_url' => $storagePath]);


        $update_cat = Category::where('id',$id)->first();
        $update_cat->update($request->all());
        return back()->with('msj', 'Categoria actualizado exitosamente');

        }else {

            $update_cat = Category::where('id',$id)->first();
            $update_cat->update($request->all());
            return back()->with('msj', 'Categoria actualizado exitosamente');
        }
    }

    public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->action('Scotiabank\CategoryController@listCategory');
    }
}
