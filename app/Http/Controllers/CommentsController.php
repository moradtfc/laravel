<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;
use App\Models\Product;
use Validator;
class CommentsController extends Controller
{
    public function comentar(request $request){

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
    	//return view('/admin/products/ficha_productos',compact('productos'));
        return back()->with('msj', 'Comentarios ingresado');
    }


    public function list_comentarios(){

        $comentarios = Comments::get();
        return view('admin/historial/listado_comentarios', compact('comentarios'));
    }

    // ROL SOCIO //

  /*  public function update(request $request){
        $comment = Comments::find($request->comentarioID);
        //$comment->state_socio = 0;
        if($comment->state == 0){
            $comment->state = 1;
        }
        else{
            $comment->state = 0;
        }
        $comment->update();
        return redirect()->back()->with('message','status updated');
    }*/


   //ROL SOCIO //
    public function update_status($id){
        $comment = Comments::find($id);
        //$comment->state_socio = 0;
        $comment->state=0;
        $comment->save();
        return redirect()->back()->with('message','status updated');
    }

}
