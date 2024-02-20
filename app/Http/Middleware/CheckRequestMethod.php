<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRequestMethod
{
    public function handle(Request $request, Closure $next)
    {
   
        if ($request->getMethod() !== 'POST') {
            abort(403, 'Acción no autorizada');
        }

        return $next($request);
    }
}
