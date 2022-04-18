<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$role)
    {

        $permission = auth()->user()->role->permission;
        $pre = in_array($role,$permission);
        if ($pre){
        }else{

            return abort(403, 'This Page Not Allowed For You.');;
        }
        return $next($request);
    }
}
