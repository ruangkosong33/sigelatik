<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->user()->role == 'admin') {
            return $next($request);
        }
        if($request->user()->verified === 1) {
            return $next($request);
        }

        Auth::logout();

        return redirect()->route('login')->withErrors(['email'=>'Terima kasih registrasi berhasil, Mohon menunggu verifikasi dari Admin.']);
    }
}
