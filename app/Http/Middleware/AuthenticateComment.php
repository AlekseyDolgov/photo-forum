<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateComment
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            return $next($request);
        }

        return redirect()->route('login')->with('error', 'Пожалуйста, войдите для того чтобы участвовать в обсуждении.');
    }
}
