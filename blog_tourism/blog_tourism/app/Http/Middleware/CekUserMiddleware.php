<?php

namespace App\Http\Middleware;

use Closure;

class CekUserMiddleware
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
        if (!session('user_id')) {
            return redirect('/login_user');
        }
        return $next($request);
    }
}
