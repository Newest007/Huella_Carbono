<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Events\PasswordReset;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function store()
    {
        $credentials= request()->validate(['email'=>['required','email','string'],'password'=>['required','string']]);
        $remember =request()->filled('remember');
    
        if( auth()->attempt($credentials,$remember)){
            request()->session()->regenerate();
            $usuario = auth()->user();
            $idrol = $usuario->id_rol;

            if($idrol == "ADM001"){
                session(['nombreRol'=> 'Admin General']);
                session(['nombre'=> $usuario->nombre]);
                return redirect('datos');
            }
            else if($idrol == "CLG001"){
                session(['nombreRol'=> 'Admin de Colegio']);
                session(['nombre'=> $usuario->nombre]);
                return redirect('datosC');
            }
        }
        throw ValidationException::withMessages(['email'=> __('auth.failed')]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->flush();
        return to_route('login');
    }
}
