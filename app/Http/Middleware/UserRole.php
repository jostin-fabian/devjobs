<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->role === 1)
            //In case it is not role 2, redirect the user to home page
            return redirect()->route('home');


        return $next($request);
    }
}
