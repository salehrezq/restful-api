<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class BasicAuth
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
        /**
         * Validate the request using basic authentication
         * and if it validates go ahead and pass on to the next request,
         * otherwise return false.
         *
         * To test this middleware, open the "auth" section of the request (any request)
         * and add an email (as the username) from the users table of the database
         * and the corresponding password => laravel uses "secret" as the password for all generated users.
         */
        return Auth::onceBasic() ?: $next($request);
    }
}
