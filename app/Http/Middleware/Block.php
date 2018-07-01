<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class Block
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->isBlock()) {
           return redirect ('/block_message');
        }
        return $next($request);
    }
}
