<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
  public function showLinkRequestForm() {
    return view('user.recuperar');
  }

  public function sendResetLinkEmail(Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
      $request->only('email')
    );
    return $status === Password::RESET_LINK_SENT
      ? back()->with('success', __($status))
      : back()->withErrors(['email' => __($status)]);
  }

}
