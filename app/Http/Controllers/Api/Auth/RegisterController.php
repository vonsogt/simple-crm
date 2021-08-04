<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class RegisterController extends Controller
{
    /**
     * Create a new RegisterController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['register']]);
    }

    /**
     * Register a User.
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
}
