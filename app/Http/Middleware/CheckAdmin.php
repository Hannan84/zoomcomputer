<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->role=='admin'){
            return $next($request);
        }else{
            return redirect()->back()->with('message','Only Admin Can Enter, Please Enter valid username and password');
        }
        
    }
}
