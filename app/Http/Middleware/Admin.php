<?php

namespace App\Http\Middleware;


use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;


class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
              
        Log::info('Admin middleware is called');
        if (Auth::check() && Auth::user()->userType === 'admin') {
            return $next($request);
        }
        return redirect()->route('home');
    }
}
