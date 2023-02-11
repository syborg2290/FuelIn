<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StationValidate
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
            if (Auth::user()->user_role == User::TYPES['ADMIN']) {
                return redirect(route('admin.dashboard'));
            }
            if (Auth::user()->user_role == User::TYPES['USER']) {
                return redirect(route('user.dashboard'));
            }

        }
        return $next($request);
    }
}
