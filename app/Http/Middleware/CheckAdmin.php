<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Closure;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::guard('admin')->user();
        if (Gate::forUser($user)->allows('admin')) {
            return $next($request);
        }

        if (Auth::guard('admin')->check()) {
            if(Auth::guard('admin')->user()->isAdmin()){
                return $next($request);
            }
        }

        return redirect('admin/login');
    }
}