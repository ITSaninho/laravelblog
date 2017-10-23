<?php

namespace App\Http\Middleware;



use Closure;

//use Auth;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Auth;
//use App\Http\Controllers\Auth;
//use Illuminate\Support\Facades\Auth;

class admin
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

        // проверяем принадлежность пользователя
        if ( Auth::check() && Auth::user()->rols_id == 2 )
        {
            return $next($request);
        }
        return redirect('/');
        //return $next($request);
    }



}
