<?php

namespace App\Http\Middleware;

use Closure;

class Authentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(!$request->session()->has("user") || $request->session()->get("role") !== $role){
            return redirect()->route("view.login", ["role" => $role]);
        }
        return $next($request);
    }
}
