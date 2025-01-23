<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Mglobal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Si la ruta no es fruteria, se sigue con la ejecución.
        if (!$request->is('fruteria/*')) {
            return $next($request);
        } else {
            return redirect()->route('inicio');
        }
    }
}