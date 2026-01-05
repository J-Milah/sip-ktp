<?php

use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isLogin;
use App\Http\Middleware\checkLogin;
use App\Http\Middleware\isOperatorCetak;
use App\Http\Middleware\isOperatorRekam;
use App\Http\Middleware\isNotAdmin;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'checkLogin'      => checkLogin::class,
            'isAdmin'         => isAdmin::class,
            'isLogin'         => isLogin::class,
            'isOperatorCetak' => isOperatorCetak::class,
            'isOperatorRekam' => isOperatorRekam::class,
            'isNotAdmin'      => isNotAdmin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
