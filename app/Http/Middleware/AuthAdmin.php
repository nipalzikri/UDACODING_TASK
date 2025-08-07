<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthAdmin
{
    // public function handle($request, Closure $next)
    // {
    //     if (!Auth::check()) {
    //         return redirect('/login');
    //     }

    //     // Cek apakah user adalah admin, sesuaikan dengan field database
    //     if (Auth::user()->role !== 'admin') {
    //         abort(403, 'Unauthorized');
    //     }

    //     return $next($request);
    // }

    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        return $next($request);
    }
}

