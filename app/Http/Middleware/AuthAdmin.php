<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if(isLoggedIn()){
            $userType = getUserType();
            if(strcmp($userType,"ITF") == 0){
                return $next($request);
            }
        }
        $request->session()->flush();
        return redirect("login");
    }
}
