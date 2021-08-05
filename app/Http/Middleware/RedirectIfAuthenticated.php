<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JWTAuth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
        }

        // Check JWT Token
        try {
            JwtMiddleware::setJwtTokenToHeader($request);
            $user = JWTAuth::parseToken()->authenticate();
            // Redirect if any jwt token
            return redirect(RouteServiceProvider::HOME);
        } catch (Exception $e) {
            return $next($request);
        }

        return $next($request);
    }
}
