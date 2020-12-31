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
        if (Gate::allows('admin')) {
            return $next($request);
        } else{
            if (Auth::check()) {
                return redirect('/');
            } else {
                return redirect('login');
            }

        }

    }
}
