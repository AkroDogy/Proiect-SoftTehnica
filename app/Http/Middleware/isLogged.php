<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;

class isLogged
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            return redirect('/');
        }
        return $next($request);
    }
}
