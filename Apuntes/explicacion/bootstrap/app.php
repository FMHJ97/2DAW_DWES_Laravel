<?php

use App\Http\Middleware\Mglobal;
use App\Http\Middleware\MayorEdad;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Middleware global.
        //$middleware->append(Mglobal::class);
        $middleware->alias([
            'mayor.edad' => MayorEdad::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();