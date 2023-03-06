<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckReferral
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
        if(isset($request->ref) && !empty($request->ref)){
            session()->put('referral_by', $request->ref); 
        }
        return $next($request);
    }
}
