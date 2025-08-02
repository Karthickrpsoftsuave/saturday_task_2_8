<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthUserDetail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user_id exists in the session
        if (!$request->session()->has('user_id')) {
            // If not authenticated, redirect to the login page or return an error
            return redirect()->route('login')->withErrors('You must be logged in to access this page.');
        }

        return $next($request);
    }
}
