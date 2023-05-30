<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth ;
class VerifyMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next){
        if(Auth::guest()){
            return redirect('/admin/users/login');
        }
        return $next($request);
    }
}
