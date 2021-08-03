<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     */
    public function login(Request $request)
    {
        $req = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:5',
        ]);

        // Return response with errors
        if ($req->fails()) {
            return response()->json($req->errors(), 422);
        }

        // Return response unauthorized
        if (!$token = auth()->attempt($req->validated())) {
            return response()->json(['Auth error' => 'Unauthorized'], 401);
        }

        // Success and generate token
        return $this->generateToken($token);
    }

    /**
     * Sign out
     */
    public function signout()
    {
        auth()->logout();
        return response()->json(['message' => 'User loged out']);
    }

    /**
     * Token refresh
     */
    public function refresh()
    {
        return $this->generateToken(auth()->refresh());
    }

    /**
     * Generate token
     */
    protected function generateToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}
