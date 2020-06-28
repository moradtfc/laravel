<?php

namespace App\Http\Controllers\Scotiabank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{
    public function listUser(){
    	$users = User::where('id_rol','3')->get();
    	//return $users;
    	return view('scotiabank/user/listado_usuarios',compact('users'));
    }

    public function registerUser(){
    	return view('scotiabank/user/registro_usuarios');
    }

    public function addUser(request $request){
    	$validator = Validator::make($request->all(), [
        'name'    => 'required|string',
        'email'    => 'required|email|unique:users',
        'password'  => 'required|string|confirmed',
        ]);

      if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $request->merge(['id_rol' => '3']);


		$usuario=User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_rol'=> $request->id_rol,
        ]);


		return back()->with('msj', 'Datos registrados exitosamente');
    }

    public function showUser($id){
    	$users = User::where('id',$id)->first();
    	return view('scotiabank/user/detalle_usuarios',compact('users'));
    }

    public function eventCancelUser(){
    	return back();
    }

    public function updateUser(request $request, $id){
        $validator = Validator::make($request->all(), [
        'name'    => 'required|string',
        'email'    => 'required|email',
        ]);

      if ($validator->fails()) {
            return back()->with('msj','Validar corréctamente los datos')
                        ->withErrors($validator)
                        ->withInput();
        }

        $users = User::where('id',$id)->first();
        $users->update($request->all());

        return back()->with('msj', 'Usuario Actualizado');

    }
    public function deleteUser($id){
    	$delete_brand = User::where('id',$id)->delete();
        return redirect()->action('Scotiabank\UserController@listUser');
    }
}
