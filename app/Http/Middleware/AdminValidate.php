<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminValidate
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

        if (!Auth::check()) {
            return redirect(route('login'));
        } else {
            if (Auth::user()->user_role == User::TYPES['USER']) {
                return redirect(route('user.dashboard'));
            }
            if (Auth::user()->user_role == User::TYPES['STATION']) {
                return redirect(route('station.dashboard'));
            }
        }
        return $next($request);
    }
}
