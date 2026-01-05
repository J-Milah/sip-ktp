<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isOperatorRekam
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!in_array(auth()->user()->jabatan, ['Operator-Rekam', 'Admin'])) {
        return redirect()
            ->route('dashboard')
            ->with('error', 'Anda tidak punya akses');
        }
        return $next($request);
    }

} 