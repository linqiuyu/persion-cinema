<?php

namespace App\Http\Middleware;

use Closure;

class CheckCipher
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
        $ciphers = [];
        if (!isset($_COOKIE['cipher']) || !in_array($_COOKIE['cipher'], $ciphers)) {
            return redirect('cipher?url=' . $request->fullUrl());
        }
        return $next($request);
    }
}
