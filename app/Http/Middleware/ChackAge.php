<?php

namespace App\Http\Middleware;

use Closure;

class ChackAge
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
        if ($request->age > 99) {
            return redirect('home');
        }

        return $next($request);
    }
}
