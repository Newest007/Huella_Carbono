<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Events\PasswordReset;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function store()
    {
        $credentials= request()->validate(['email'=>['required','email','string'],'password'=>['required','string']]);
        $remember =request()->filled('remember');
    
        if( auth()->attempt($credentials,$remember)){
            request()->session()->regenerate();
    
            return redirect('index');
        }
        throw ValidationException::withMessages(['email'=> __('auth.failed')]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->flush();
        return to_route('login');
    }
}
