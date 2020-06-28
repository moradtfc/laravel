<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
  public function redirectTo(){

     // User role
    $role = Auth::user()->roles->name;
    $id = Auth::user()->id;  
    
    // Check user role
    switch ($role) {
        case 'admin':
                return 'admin/dashboard';
            break;
        case 'scotiabank':
                return 'scotiabank/dashboard';
            break;
         case 'socio':
                return 'socios/comentarios';
            break;     
        default:
                return '/login'; 
            break;
    }
}

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
