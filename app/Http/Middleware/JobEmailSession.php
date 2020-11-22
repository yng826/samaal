<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class JobEmailSession
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
        if (!$request->session()->exists('email')) {
            return redirect(route('work.job'));
        }
        return $next($request);
    }
}
