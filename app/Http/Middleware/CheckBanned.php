<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CheckBanned
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->banned_until && now()->lessThan(auth()->user()->banned_until)) {
            $banned_days = now()->diffInDays(auth()->user()->banned_until);
            auth()->logout();

            if ($banned_days > 14) {
                $message = 'Ваш аккаунт был заморожен. Пожалуйста, свяжитесь с администратором.';
            } else {
                $message = 'Ваш аккаунт был заблокирован на '.$banned_days.' '. Str::plural('день', $banned_days).'. Пожалуйста, свяжитесь с администратором.';
            }

            return redirect()->route('login')->withMessage($message);
        }

        return $next($request);
    }
}
