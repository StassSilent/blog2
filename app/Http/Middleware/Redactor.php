<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class Redactor
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->isRedactor()) {
            return $next($request);
        }
        return redirect('redactor');
    }
}
