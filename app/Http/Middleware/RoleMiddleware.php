<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
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




        // if (Auth::check()) {

        //     $user = Auth::user();
        //     if ($user->roles->id == 2) {
        //         return $next($request);
        //     } else
        //         return redirect('/');
        // } else return redirect()->to('login');


        if (Auth::check() && Auth::user()->roles->id == 2) {
            return $next($request);
        } else if (Auth::check() && Auth::user()->roles->id == 1) {
            return redirect(route('home.user'));
        }
        return redirect()->to('login');
    }
}
