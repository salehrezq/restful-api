<?php

namespace App\Http\Middleware;

use Closure;

class TokenAuth
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
        $token = $request->header('X-API-TOKEN');

        /**
         * In Postman, test this middleware by setting a key-value pair
         * in the Headers section of the request (any request):
         *
         * key: X-API-TOKEN
         * value: test-value
         *
         */
        if ('test-value' !== $token) {
            abort(401, 'Auth Token not found');
        }
        return $next($request);
    }
}
