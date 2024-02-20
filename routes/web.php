<?php

use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UserController;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        if (auth()->user()->role == "admin") {
            return view('admin.index');
        }
    }
    $productos=Producto::all();

    return view('welcome',['productos'=>$productos]);
})->name('home');

Route::middleware(['guest'])->group(function () {
Route::get('/register', [RegisterController::class, 'show'])->name('register');
});
Route::post('/register', [RegisterController::class, 'register']);


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    });
Route::post('/login', [LoginController::class, 'login']);

Route::get('/contactanos', [UserController::class, 'contactanos'])->name('contact')->middleware('user');
Route::post('/contactar', [UserController::class, 'contactar'])->middleware('checkRequestMethod');
Route::get('/logout', [UserController::class, 'logout']);
Route::get('/privacidad', [UserController::class, 'privacidad'])->name('priv')->middleware('user');
Route::get('/tyc', [UserController::class, 'tyc'])->name('terms')->middleware('user');
Route::get('/faq', [UserController::class, 'faq'])->name('faq')->middleware('user');
Route::get('/acerca', [UserController::class, 'acerca'])->name('acerca')->middleware('user');
Route::get('/restablecer', [UserController::class, 'recuperar']);
Route::post('/restablecer', [UserController::class, 'restablecer'])->middleware('checkRequestMethod');
Route::get('/cambiar/{id}', [UserController::class, 'cambiar'])->middleware('checkRequestMethod')->where('id', '[0-9]+')->whereNumber('id');
Route::put('/cambio/{id}', [UserController::class, 'cambio'])->middleware('checkRequestMethod')->where('id', '[0-9]+')->whereNumber('id');

Route::get('/productos', [ProductoController::class, 'productos'])->name('produc')->middleware('user');

Route::get('/mispedidos', [ProductoController::class, 'pedidos'])->name('pedidos')->middleware('user');
Route::get('/mapa', [UserController::class, 'mapa'])->name('mapa')->middleware('user');
Route::get('/buscar', [ProductoController::class, 'buscar'])->name('product')->middleware('user');
Route::get('/pasteles', [ProductoController::class, 'pasteles'])->name('pasteles')->middleware('user');
Route::get('/gelatinas', [ProductoController::class, 'gelatinas'])->name('gelatinas')->middleware('user');
Route::get('/galletas', [ProductoController::class, 'galletas'])->name('galletas')->middleware('user');
Route::get('/nuevoproducto', [ProductoController::class, 'nuevo'])->name('nuevopro')->middleware('admin');

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::post('/crear', [ProductoController::class, 'crear'])->name('crear');
Route::get('/pedir/{producto}', [ProductoController::class, 'pedir'])->name('pedir.producto')->middleware('auth')->where('producto', '[0-9]+')->whereNumber('producto');
Route::post('/pedido', [ProductoController::class, 'pedido'])->name('pedido');
Route::get('/grafica',[ProductoController::class,'grafica'])->name('grafica')->middleware('admin');
Route::get('/realizados',[ProductoController::class,'realizados'])->name('realizados')->middleware('admin');
Route::get('/entregados',[ProductoController::class,'entregados'])->name('entregados')->middleware('admin');
Route::get('/usuarios',[ProductoController::class,'usuarios'])->name('usuarios')->middleware('admin');
Route::get('/recuperar-contraseña', [UserController::class, 'showSecretQuestionForm'])->name('recuperar.form');
Route::post('/recuperar-contraseña', [UserController::class, 'checkSecretAnswer'])->name('recuperar');
Route::post('/password/secret/respuesta', [UserController::class, 'cambiarContrasena'])->name('password.secret.respuesta');
Route::get('/existencias',[ProductoController::class,'existencias'])->name('existencia')->middleware('admin');
Route::put('/editar/{id}',[ProductoController::class,'actualizar'])->name('actualizar')->middleware('admin');
Route::put('/entregar/{pedido}', [ProductoController::class, 'entregar'])->name('entregar')->middleware('admin');
