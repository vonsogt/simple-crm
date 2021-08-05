<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use JWTAuth;
use Exception;

class JwtMiddleware
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
        try {
            $this->setJwtTokenToHeader($request);
            $user = JWTAuth::parseToken()->authenticate(); 
        } catch (Exception $e) {
            // Redirect to login if doesn't have any token or expired
            return response()->redirectTo('login');
        }
        return $next($request);
    }

    public static function setJwtTokenToHeader($request)
    {
        // Decleare variable $bearer_token
        $bearer_token = '';

        // Search token from header cookies
        $headerCookies = explode('; ', $request->header('cookie'));
        foreach ($headerCookies as $key => $cookieString) {
            $cookie = explode('=', $cookieString);
            if ($cookie[0] === 'token')
                $bearer_token = $cookie[1];
        }

        if ($bearer_token !== '')
            $request->headers->set('Authorization', "Bearer " . $bearer_token);
    }
}
