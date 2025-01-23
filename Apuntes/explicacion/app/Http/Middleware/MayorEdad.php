<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MayorEdad
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $tope): Response
    {
        // Lo que queremos comprobar.
        if ($request->route('edad') < $tope) {
            return redirect()->route('inicio');
        }
        return $next($request);
    }
}