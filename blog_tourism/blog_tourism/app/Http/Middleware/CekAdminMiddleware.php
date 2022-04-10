<?php

namespace App\Http\Middleware;

use Closure;

class CekAdminMiddleware
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
        if (!session('admin_id')) {
            return redirect('/login_user');
        }
        return $next($request);
    }
}
