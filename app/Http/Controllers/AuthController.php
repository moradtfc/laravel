<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
class AuthController extends Controller
{

    //Socio
    public function openChangePasswordView(){

    	return view('/socios/cambiar_contrasena');
    }
    public function updatePassword(Request $request){
/*
        $this->validate($request, [
            'password' => 'required',
            'password_new' => 'required|confirmed',
            'password_new_confirmation' => 'required'
        ]);

        $id = Auth::user()->id;

        if (!Hash::check($request->password, $users->password)) {
            return response()->json(['errors' => ['password'=> ['No existe']]], 422);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return $user;*/
        if (!(Hash::check($request->get('password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        if(strcmp($request->get('password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        $validatedData = $request->validate([
            'password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
        //Change Password

        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","Password changed successfully !");

    }
}
