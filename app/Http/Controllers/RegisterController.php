<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    //
    public function show(){
        return view('user.register');
        }

    public function register(RegisterRequest $request){
        $user = User::create($request->validated());
        Auth::login($user);
        return redirect('/ubicaciones')->with('success','Cuenta Creada Correctamente');
    }
}
