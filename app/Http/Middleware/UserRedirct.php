<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;


class UserRedirct
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

        if(Auth::check()){
            $expertTime = Carbon::now()->addSeconds(30);
            Cache::put('user-is-online'.Auth::user()->id , true, $expertTime);
            User::where('id',Auth::user()->id)->update(['last_seen' => Carbon::now()]);
        }

        if(Auth::check() && Auth::user()){
            return $next($request);
        }else{
            return redirect()->route('login');
        }
    }
}
