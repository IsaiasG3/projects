<?php

namespace App\Http\Controllers;

use App\Mail\Avisar;
use App\Mail\Recuperar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function logout(){
        Session::flush();
        Auth::logout();

        return redirect()->to('/');
    }

    public function contactanos(){
        return view('user.contactanos');
    }
    public function mapa(){
        return view('user.mapa');
    }

    public function acerca(){
        return view('user.acerca');
    }


    public function contactar(Request $request){
        $referer = $request->headers->get('referer');
        $createUrl = url('/contactar');

        if ($referer !== $createUrl) {
            abort(403, 'Acción no autorizada');
        }
        $request->validate([
            'nombre'=> 'required|string',
            'correo'=> 'required|string',
            'mensaje'=> 'required|string',
        ]);
        $correo = new Avisar($request->nombre,$request->correo,$request->mensaje);
        Mail::to('20610022@utgz.edu.mx')->queue($correo);
        return redirect('/contactanos')->with('success','Mensaje Enviado');
    }
    public function privacidad(){
        return view('user.privacidad');
    }

    public function tyc(){
        return view('user.tyc');
    }
    public function faq(){
        return view('user.faq');
    }

    public function recuperar(){
        return view('user.recuperar');
    }
    public function restablecer(Request $request){
        $request->validate([
            'email'=>'required|email']);
            $email = $request->email;
            $status = Password::sendResetLink(
                $request->only('email')
            );
            return $status == Password::RESET_LINK_SENT
            ? back()->with('success',_($status))
            : back()->withErrors(['email'=>_($status)]);

         //  $user=User::where("email","=",$email)->get()->last();

         //   $correo = new Recuperar($user->name,$user->id);
        //    Mail::to($request->email)->send($correo);
           // return redirect('/restablecer')->with('success','Se ha enviado el correo de recuperación');

    }

    public function cambiar($id){

        $user = User::find($id);
        return view('user.cambiar',['user',$user]);
    }

    public function cambio(Request $request,$id){
        $request->validate([
            'password'=>'required'
        ]);
        $contra = $request->password;

        $user = User::find($id);
        dd($user);
        $user->password=$contra;
        $user-> save();
        return redirect('/login')->with('success','Se ha actualizado correctamente la contraseña');
    }
    public function showSecretQuestionForm()
{
    return view('user.preguntas');
}
public function checkSecretAnswer(Request $request)
{

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'El correo electrónico no está registrado.']);
        }

        if (!$user->pregunta) {
            return redirect()->back()->withErrors(['email' => 'El usuario no tiene una pregunta secreta registrada.']);
        }

        return view('user.secreto', ['user' => $user]);

}

public function cambiarContrasena(Request $request)
{
    $request->validate([
        'respuesta' => 'required',
        'password' => [
            'required',
            'string',
            'min:8',
            'regex:/[A-Z]/', // al menos una mayúscula
            'regex:/[0-9]/', // al menos un número
            'confirmed'
        ],

    ]);

    $user = User::where('email', $request->input('email'))->first();

    if (!$user) {
        return back()->withErrors([
            'email' => 'El correo electrónico no está registrado en nuestra base de datos.',
        ]);
    }

    if ($request->input('respuesta') !== $user->respuesta) {
        return back()->withErrors([
            'respuesta' => 'La respuesta proporcionada es incorrecta.',
        ]);
    }

    $user->password =$request->input('password');
    $user->save();

    return redirect()->route('login')->with('success', 'Su contraseña ha sido cambiada correctamente. Por favor, inicie sesión con su nueva contraseña.');
}

}



