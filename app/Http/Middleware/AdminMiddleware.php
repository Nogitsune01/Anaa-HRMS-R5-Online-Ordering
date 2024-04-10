<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            try {
                if(Auth::user()->role == 'Admin'){
                    return $next($request);
                }elseif(Auth::user()->role == 'Guest'){
                    return redirect('orders/restaurant-ordering');
                    
                }else{
                    return redirect('restaurant-ordering-login');
                }
            } catch (\Throwable $th) {
                Alert::error('Error', $th->getMessage());
                return redirect()->back();
            }
        }
       
    }
}
