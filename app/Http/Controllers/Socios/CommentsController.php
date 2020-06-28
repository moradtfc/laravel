<?php

namespace App\Http\Controllers\Socios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\Product;
use App\Models\Parameter;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use Validator;

class CommentsController extends Controller
{
    public function comment(request $request){

    	$validator = Validator::make($request->all(), [
        'contenido'    => 'required|string',
        ]);

    	if ($validator->fails()) {
            return back()->with('msj','Validar corréctamente los datos')
                        ->withErrors($validator)
                        ->withInput();
        }

    	$id =  $request->product_id;
        $comment = Comments::create($request->all());
    	$productos=Product::where('id',$id)->with('brand','comentarios.user')->first();
        //return $productos;
    	//return view('/socios/products/ficha_productos',compact('productos'));
        return back()->with('msj', 'Comentarios ingresado');
    }


    public function listComments(){
        $id = Auth::user()->id;

       $comentarios=Comments::withTrashed()->where('user_id',$id)->get();
     



         //return $productos;

         return view('socios.comentarios',compact('comentarios'));

}

    public function detailComment(){
        $productos=Product::where('id',$id)->with('brand','comentarios.user')->first();
        $productos->withCount('commentarios.user')->get();

    	return view('/socios/producto/listado_productos_staging',compact('status_comment'));
    	//return $productos->brand;

    }

    public function deleteComment($id){
        $comment = Comments::find($id);
        $comment->delete();
        return redirect()->back()->with('message','¡Hecho!');
    }
}
