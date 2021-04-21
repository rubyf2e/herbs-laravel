<?php

namespace App\Admin\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminSecure
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        config(['admin.secure' => $request->secure()]);
        return $next($request);
    }
}