<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckManagerEarning
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
        if(now()->format('d') == 1){
            if(auth()->check() && auth()->user()->is_manager == 1){
                
                if(auth()->user()->manager_amount >= 5000){
                   
                    $new_wallet_balance = auth()->user()->wallet + auth()->user()->manager_amount; 

                    auth()->user()->update(['manager_amount'=>$new_wallet_balance]);
                }else{
                    auth()->user()->update(['manager_amount'=>0]);
                }
                
            }
        }
            
        return $next($request);
    }
}
