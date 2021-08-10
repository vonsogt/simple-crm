<?php

namespace App\Http\Middleware;

use App\Models\User;
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
            return response()->redirectTo(route('login'));
        }
        $this->setUserPreferences($user->id, $request);
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

    public static function setUserPreferences($id, $request)
    {
        $jwt = new JwtMiddleware;
        $language = $jwt->getUserPreference($id, 'language') ?? 'en';
        $timezone = $jwt->getUserPreference($id, 'timezone') ?? 'UTC';
        config(['app.timezone' => $timezone]);
        \App::setLocale($language);
    }

    public static function getUserPreference($id, $name)
    {
        $preferences = User::find($id)->preferences()->get();
        $preference_data = null;

        foreach ($preferences as $preference) {
            if ($preference->name == $name)
                $preference_data = $preference->data;
        }

        return $preference_data;
    }
}
