<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request)
        //->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allowed-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
        ->header('Access-Control-Allowed-Headers', 'Content-Type, Accept, Authorization, X-Requested-With, Application, x-xsrf-token, x-csrf-token')
        ->header('X-Content-Type-Options', 'nosniff');
    }
}
