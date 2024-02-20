<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EsVendedorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        // Verificar si el usuario actual es vendedor
        if (Auth::user() && Auth::user()->role === 'vendedor') {
            return $next($request);
        }

        // Si el usuario no es vendedor, redirigir a la sección para convertirse en vendedor
        return redirect('/vendedor');
    }
}
