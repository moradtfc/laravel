<?php

namespace App\Http\Controllers\Socios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CommentsStore;
use App\Models\Product;
use App\Models\Parameter;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use Validator;

class CommentsStoreController extends Controller
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
    	$id =  $request->brand_id;
        $comment = CommentsStore::create($request->all());
        $brands=Brand::where('id',$id)->with('commentStore.user')->first();
        return back()->with('msj', 'Comentarios ingresado');
    }

    public function deleteCommentStore($id){
        $comment = CommentsStore::find($id);
        $comment->delete();
        return redirect()->back()->with('message','¡Hecho!');
    }

}
