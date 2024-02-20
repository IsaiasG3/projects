<?php

namespace App\Http\Controllers;

use App\Mail\Avisar;
use App\Mail\Recuperar;
use App\Models\Dato;
use App\Models\DetalleVenta;
use App\Models\Mensaje;
use App\Models\Producto;
use App\Models\Ubicacion;
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
    public function verMisProductos()
{
    $usuarioActual = Auth::user();

    // Obtener todos los productos creados por el usuario actual
    $misProductos = Producto::where('id_usuario', $usuarioActual->id)->get();

    return view('user.mproductos', compact('misProductos'));
}

    public function venta()
{
    $detallesVenta = DetalleVenta::whereHas('producto', function ($query) {
        $query->where('id_usuario', Auth::user()->id);
    })->get();

    // Retornar la vista para visualizar las ventas con la lista de detalles de venta del vendedor
    return view('user.ventas', compact('detallesVenta'));
}

    public function vistaCalificarProducto($id)
{
    // Obtener el producto por su id y asegurarse de que el usuario actual sea el comprador o el vendedor
    $producto = Producto::find($id);

    if (!$producto) {
        return redirect()->route('misCompras')->with('error', 'El producto no existe.');
    }

    // Puedes agregar aquí la validación para comprobar si el usuario actual puede calificar este producto.
    // Por ejemplo, si es el comprador o el vendedor.

    // Retornar la vista para calificar el producto con el objeto del producto
    return view('user.calificar', compact('producto'));
}
    public function enviarMensaje($id)
    {
        // Obtener el producto por el id y asegurarse de que el usuario actual sea el comprador o el vendedor
        $producto = Producto::find($id);

        if (!$producto) {
            return redirect()->back()->with('error', 'El producto no existe.');
        }

        $usuarioActualId = Auth::user()->id;
        $vendedorId = $producto->id_usuario;



        // Obtener los mensajes relacionados con el producto y ordenarlos por fecha
        $mensajes = Mensaje::where('id_usuarior', $usuarioActualId)
            ->where('id_usuarioe', $vendedorId)
            ->orderBy('fechaenvio', 'asc')
            ->get();

        // Retornar la vista con el producto y los mensajes
        return view('user.mensajes', compact('producto', 'mensajes'));
    }


    public function logout(){
        Session::flush();
        Auth::logout();

        return redirect()->to('/');
    }
    public function ubicaciones(){
        return view('user.ubicaciones');
    }

    public function ubicaciones2()
{
    // Obtener el usuario autenticado actualmente
    $usuario = Auth::user();

    // Obtener las ubicaciones relacionadas con el usuario
    $ubicaciones = $usuario->ubicaciones;

    return view('user.ubicaciones2', ['ubicaciones' => $ubicaciones]);
}
    public function vender(){
        $user = Auth::user();
        $direcciones = $user->domicilios;

        return view('user.vendedor', compact('user', 'direcciones'));
    }

    public function guardarRegistro(Request $request)
{
    // Validar los datos recibidos del formulario
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'telefono' => 'required|string|max:20',
        'ubicacion_vendedora' => 'required', // Validar que haya seleccionado una ubicación
        'numero_cuenta' => 'nullable|string|max:255', // Asegurarnos de que este campo es opcional
        'banco' => 'nullable|string|max:255', // Asegurarnos de que este campo es opcional
        'titular' => 'nullable|string|max:255', // Asegurarnos de que este campo es opcional
        'aceptar_terminos' => 'required', // Validar que haya aceptado los términos y condiciones
    ]);

    // Obtener el usuario autenticado

    $user = Auth::user();
    $user = User::find($user->id);
    // Actualizar los datos del usuario
    $user->name = $request->name;
    $user->email = $request->email;
    $user->telefono = $request->telefono;
    $user->role = 'vendedor'; // Supongo que aquí querías actualizar el rol del usuario a 'vendedor'
    // No es necesario usar $user->save() ya que Laravel guardará automáticamente los cambios.
    $user->save();
    // Obtener la ubicación seleccionada por el usuario
    $ubicacionSeleccionada = Ubicacion::findOrFail($request->ubicacion_vendedora);

    // Cambiar el tipo de la ubicación a "venta"
    $ubicacionSeleccionada->tipo = 'venta';
    $ubicacionSeleccionada->save();

    // Guardar los datos bancarios si fueron proporcionados
    if (!empty($request->numero_cuenta) && !empty($request->banco) && !empty($request->titular)) {
        $datosBancarios = new Dato([
            'id_usuario' => $user->id,
            'numero_cuenta' => $request->numero_cuenta,
            'banco' => $request->banco,
            'titular' => $request->titular,
        ]);
        $datosBancarios->save();
    }

    return redirect('/')->with('success', 'Registro completado exitosamente');
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

    public function ubicacion(Request $request)
{

    $request->validate([
        'direccion' => 'required|string',
        'ciudad' => 'required|string',
        'estado' => 'required|string'
    ]);

    $idUsuario = Auth::id();
    $ubicacion = new Ubicacion([
        'id_usuario' => $idUsuario,
        'direccion' => $request->input('direccion'),
        'ciudad' => $request->input('ciudad'),
        'estado' => $request->input('estado'),
    ]);
    $ubicacion->tipo = 'compra';
     // Guardar el objeto Producto en la base de datos
     $ubicacion->save();

     // Redirigir a la página de detalles del producto recién creado
     return redirect('/');
 }

    public function contactar(Request $request){

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



