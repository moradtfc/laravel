<?php

namespace App\Http\Controllers\Scotiabank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\Product;
use App\Models\CommentsStore;
use App\Models\Parameter;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use Validator;

class CommentsController extends Controller
{

    public function listHistorialComments(){
        $comentariostienda = CommentsStore::withTrashed()->get();

        $comentarios = Comments::withTrashed()->get();

        return view('/scotiabank/historial/listado_comentarios', compact('comentarios','comentariostienda'));
    }
}
