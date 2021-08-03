<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JwtController extends Controller
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

        if ($req->fails()) {
            return response()->json($req->errors(), 422);
        }

        if (!$token = auth()->attempt($req->validated())) {
            return response()->json(['Auth error' => 'Unauthorized'], 401);
        }

        return $this->generateToken($token);
    }

    /**
     * Sign up.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $req = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);

        if ($req->fails()) {
            return response()->json($req->errors()->toJson(), 400);
        }

        $user = User::create(array_merge(
            $req->validated(),
            ['password' => bcrypt($request->password)]
        ));

        return response()->json([
            'message' => 'User signed up',
            'user' => $user
        ], 201);
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
     * User
     */
    public function user()
    {
        return response()->json(auth()->user());
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
