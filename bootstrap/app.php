<?php

use App\Http\Middleware\CheckForAuth;
use App\Http\Middleware\CheckForPrice;
use App\Http\Middleware\Lang;
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

        // Middleware Aliases

        $middleware->alias([

            'check.for.auth' => CheckForAuth::class,

            'check.for.price' => CheckForPrice::class,

            'check.for.lang' => Lang::class,

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
