<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CheckLogin
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

        if(auth()->check() && (auth()->user()->status == 0)){
            Auth::logout();
            return redirect()->back()->with('error', 'Your Account is suspended, please contact Admin.');
        }
        return $next($request);
        // if (auth()->user()->status != 0) {
        //     return $next($request);
        // } else {
        //     if (auth()->user()->status == 0) {
        //         return back()->with('inactiveError', 'These credentials do not match our records.');
                
        //     } else {
        //         return back()->with('inactiveError', 'These credentials do not match our records');
        //     }
        // }
    }
}
