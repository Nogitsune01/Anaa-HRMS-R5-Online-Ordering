<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OnlineOrderingAccounts;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class OnlineOrderingLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            try {
                if (Auth::user()->role == 'Guest') {
                    return $next($request);
                } else {
                    Alert::error('Login first');
                    return redirect()->back();
                }
            } catch (\Throwable $th) {
                Alert::error('Something went wrong', $th->getMessage());
                return redirect()->back();
            }
        } else {
            Alert::error('Login first');
            return redirect()->back();
        }
    }
}
