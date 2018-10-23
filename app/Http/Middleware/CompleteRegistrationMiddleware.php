<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CompleteRegistrationMiddleware
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
            if(isset(Auth::user()->level)){
                return $next($request);
            }
                return redirect('/complete-profile');
    }
}
