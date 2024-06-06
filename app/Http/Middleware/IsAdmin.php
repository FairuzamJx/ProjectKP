<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
{
    // Memeriksa apakah pengguna masuk
    if ($request->user()) {
        // Jika pengguna adalah super admin, langsung izinkan akses
        if ($request->user()->is_admin === 'superadmin') {
            return $next($request);
        }

        // Memeriksa apakah pengguna memiliki salah satu peran yang diizinkan
        if (in_array($request->user()->is_admin, $roles)) {
            return $next($request);
        }
    }

    // Redirect jika tidak memiliki akses
    return redirect('/')->with('danger', "Anda tidak memiliki akses admin.");
}}
