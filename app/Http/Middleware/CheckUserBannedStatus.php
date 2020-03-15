<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserBannedStatus
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
        if (auth()->check() && (! request()->routeIs('logout'))) {
            if (auth()->user()->is_banned)
                return response()->json(['message' => 'Вы заблокированы.'],403);
        }

        return $next($request);
    }
}
