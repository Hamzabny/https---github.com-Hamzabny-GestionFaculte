<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfesseurMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()) {
            // admin role ==1
            //user role ==0
            // professeur role==2
                    if(Auth::user()->role == '2') {
                   return $next($request);
                    } else {
                        return redirect('/home')->with('message','Access denied as you are not Professeur!');
                    }
           
                   } else {
                       return redirect('/login')->with('message','Login to Access the website!');
                   }
        return $next($request);
    }
}
