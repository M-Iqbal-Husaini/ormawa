<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OrmawaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::guard('ormawa')->user();

        // Pastikan admin ormawa memiliki id_organisasi
        if (!$user || !$user->id_organisasi) {
            return redirect('/')->withErrors('Akses ditolak. ID organisasi tidak valid.');
        }

        return $next($request);
    }
}
