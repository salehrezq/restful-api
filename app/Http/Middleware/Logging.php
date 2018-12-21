<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class Logging
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // You can find logs at this path: storage/logs/laravel.log
        Log::debug($request->method());
        return $next($request);
    }

    /**
     * Handle an outgoing response.
     *
     * @param $request
     * @param $response
     */
    public function terminate($request, $response)
    {
        // You can find logs at this path: storage/logs/laravel.log
        Log::debug($response->status());
    }
}
