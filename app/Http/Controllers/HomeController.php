<?php

namespace App\Http\Controllers;

use App\Models\ImagenProducto;
use App\Models\Producto;
use App\Models\Ubicacion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index()
    {

        $user = Auth::user();
        $productos = Producto::with('imagen')->latest()->take(20)->get();
        if ($user) {
            $domicilios = $user->domicilios;
        } else {
            $domicilios = null;
        }

        return view('welcome', ['user' => $user, 'domicilios' => $domicilios, 'productos' => $productos]);
    }


}
