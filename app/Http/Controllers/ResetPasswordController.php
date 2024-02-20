<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
  public function showResetForm(Request $request, $token = null) {
    return view('user.cambiar')->with([
      'token' => $token,
      'email' => $request->email,
    ]);
  }

  public function reset(Request $request){
    $request->validate([
      'token' => 'required',
      'email' => 'required|email',
      'password' => 'required|confirmed|min:8',
      'password_confirmation' => 'required',
    ]);
  //  dd($request);
    $status = Password::reset(
      $request->only('email', 'password', 'password_confirmation', 'token'),
      function ($user, $password) {
        $user->forceFill([
            'password' => $password,
        ])->save();
        event(new PasswordReset($user));
      }
    );

    return $status === Password::PASSWORD_RESET
      ? redirect()->route('login')->with('success', 'Contraseña Actualizada')
      : back()->withErrors(['email' => [__($status)]]);
  }


}
