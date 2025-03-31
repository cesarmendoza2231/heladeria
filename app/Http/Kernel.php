<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
       // \App\Http\Middleware\TrustProxies::class,
        \Illuminate\Http\Middleware\HandleCors::class,
        \App\Http\Middleware\PreventBackHistory::class, // Añade esto
    ];

    protected $middlewareAliases = [
        'prevent.back' => \App\Http\Middleware\PreventBackHistory::class,// Añade esto
    ];
}