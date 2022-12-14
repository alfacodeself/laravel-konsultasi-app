<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SessionUserLoginMiddleware
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
        if (auth('admin')->check()) {
            return back()->with('error', 'Anda telah terdeteksi sebagai admin! Harap logout terlebih dahulu!');
        }
        if (!auth()->guard('user')->check()) {
            return redirect()->route('login')->with('warning', 'Session tidak ditemukan! Silakan Login');
        }
        return $next($request);
    }
}
