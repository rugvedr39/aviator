<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckUserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is logged in
        if (Session::has('userlogin')) {
            // User is logged in, redirect to the dashboard or home
            return redirect()->to('/home'); // Change '/home' to your desired URL
        }

        return $next($request);
    }
}
