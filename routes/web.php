<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\ComputoController;
use App\Http\Controllers\TelefoniaController;
use App\Http\Controllers\ComputoHistorialController;

use App\Http\Controllers\TelefoniaHistorialController;
use App\Http\Controllers\EditarController;
use App\Http\Controllers\Editar2Controller;
use App\Http\Controllers\Editar3Controller;
use App\Http\Controllers\HistorialEditarController;
use App\Http\Controllers\VerController;
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
    return view('welcome');
});

/*------------------------------------------------------------------------------*/
                                                                                //
Route::resource('cliente',ClienteController::class);                            //
Route::get('/clientes2',[ClienteController::class,'clientes']);                 //
Route::get('/nuevo/cliente',function(){                                         //
    return view('clientes.nuevocliente');                                       //
});                                                                             //
/*----------------------------------------------------------------------------- */
                                                                                //
Route::resource('colaborador',ColaboradorController::class);                    //
Route::get('/colaboradores2',[ColaboradorController::class,'colaborador']);
Route::get('/colaboradores3',[ColaboradorController::class,'bajas']);           //
Route::get('/nuevo/colaborador',function(){                                     //
    return view('colaboradores.nuevocolaborador');                              //
});                                                                             //
/*------------------------------------------------------------------------------*/
Route::resource('computo',ComputoController::class);                            //
Route::get('/computos2',[ComputoController::class,'computo']);                  //
Route::resource('importar',ComputoController::class);                           //
Route::post('/importar',[ComputoController::class,'importar']);                 //
Route::resource('exportar',ComputoController::class);                           //
Route::get('/exportar',[ComputoController::class,'exportar']);                 //                                                                         //
Route::get('/nuevo/computo',function(){                                         //
    return view('computos.nuevocomputo');                                       //
});                                                                             //
/*------------------------------------------------------------------------------*/
Route::resource('telefonia',TelefoniaController::class);                        //
Route::get('/telefonias2',[TelefoniaController::class,'telefonia']);
Route::resource('editar',EditarController::class);
Route::resource('ver',VerController::class);
Route::resource('editar2',Editar2Controller::class);
Route::resource('editar3',Editar3Controller::class);      //                                                                         //
Route::get('/nuevo/telefonia',function(){                                       //
    return view('telefonias.nuevotelefonia');                                   //
});

Route::resource('importar2',TelefoniaController::class);                           //
Route::post('/importar2',[TelefoniaController::class,'importar2']);                 //
Route::resource('exportar2',TelefoniaController::class);                           //
Route::get('/exportar2',[TelefoniaController::class,'exportar2']);                                       //
/*------------------------------------------------------------------------------*/

Route::resource('historial',ComputoHistorialController::class);

Route::get('/historiales2',[ComputoHistorialController::class,'historial']);


Route::resource('historialt',TelefoniaHistorialController::class);
Route::get('/historialest',[TelefoniaHistorialController::class,'historialt']);


Route::resource('importar3',ColaboradorController::class);                           //
Route::post('/importar3',[ColaboradorController::class,'importar3']);

Route::resource('importar4',ColaboradorController::class);                           //
Route::post('/importar4',[ColaboradorController::class,'importar4']);


Route::resource('historialeditar',HistorialEditarController::class);

