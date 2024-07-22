<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     */
    public function handle(Request $request, Closure $next)
{
    if(!auth()->user()){
        return redirect('/');
    }
    if(!auth()->user()->is_admin){
        return abort(403);
    }
    return $next($request);
}

}