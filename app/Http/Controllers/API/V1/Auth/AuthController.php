<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:5',
        ]);

        // Get remember me request
        $expire_in = $request->remember_me == 'on' ? (60 * 24 * 30) : 60;

        // Return response with errors
        if ($validator->fails()) {
            return redirect(route('login') . '?login=error&email=' . $request->email . '&msg=' . json_encode($validator->errors()));
            return response()->json($validator->errors(), 422);
        }

        // Return response unauthorized
        if (!$token = auth()->setTTL($expire_in)->attempt($validator->validated())) {
            return redirect(route('login') . '?login=unauthorized&email=' . $request->email);
        }

        $access_token = json_decode($this->generateToken($token, $expire_in)->getContent())->access_token;
        $cookie = cookie('token', $access_token, $expire_in);

        return redirect(route('admin.home') . '?login=success')->withCookie($cookie);
    }

    /**
     * Log out
     */
    public function logout()
    {
        auth()->logout();
        // Reset token or set null
        return response()->redirectTo(route('login'))->withCookie(cookie('token', null));
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function tokenRefresh()
    {
        return $this->generateToken(auth()->refresh());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile()
    {
        return response()->json(auth()->user());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function generateToken($token, $expire_in = 60)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $expire_in,
            'user' => auth()->user()
        ]);
    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));

        return response()->json([
            'message' => 'User signed up',
            'user' => $user
        ], 201);
    }
}
