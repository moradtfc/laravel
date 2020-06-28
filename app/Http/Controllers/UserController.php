<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{
    public function openUser(){
    	return view('/admin/user/registro_usuarios');
    }

     public function addUser(request $request){

    	$validator = Validator::make($request->all(), [
        'name'    => 'required|string',
        'email'    => 'required|email|unique:users',
        'password'  => 'required|string|confirmed',
        'id_rol'            => 'required',
        ]);

      if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }


		$usuario=User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_rol'=> $request->id_rol,
        ]);


return back()->with('msj', 'Datos registrados exitosamente');
    }

    public function deleteUser($id){
        
        $usuario= User::find($id);

        if($usuario->id_rol!=1){
                    $usuario->delete();
                                }

     

        return back()->with('msj', 'Usuario eliminado exitosamente');
    }

    public function listUser(){
        $usuarios=User::get();
    	return view('/admin/user/listado_usuarios',compact('usuarios'));
    }
}
