<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()->verified) {
            return $next($request);
        }
        return redirect('/')->with('error', 'Verifieer uw email door uw wachtwoord te wijzigen om toegang te krijgen tot de gehele website.');
    }
}
