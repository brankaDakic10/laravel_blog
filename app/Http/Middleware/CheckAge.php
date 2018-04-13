<?php

namespace App\Http\Middleware;

use Closure;

class CheckAge
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
        // moze i ovako $request->age
        if($request->get('age') <= 18 ){
        //   add new view blade
        return response(view('register.forbidden-under-18')); 
        }
        return $next($request);
    }
}
