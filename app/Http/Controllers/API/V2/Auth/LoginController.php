<?php

namespace App\Http\Controllers\API\V2\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use Config;
use JWTAuth;
use JWTAuthException;

class LoginController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('assign.guard:employees', ['except' => ['loginEmployee', 'loginUser']]);
    }

    /**
     * loginUser
     *
     * @param  mixed $request
     * @return void
     */
    public function loginUser(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $token = null;
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'response' => 'error',
                    'message' => 'invalid_email_or_password',
                ]);
            }
        } catch (JWTAuthException $e) {
            return response()->json([
                'response' => 'error',
                'message' => 'failed_to_create_token',
            ]);
        }
        return response()->json([
            'response' => 'success',
            'result' => [
                'token' => $token,
                'message' => 'I am front user',
            ],
        ]);
    }

    /**
     * Handle a login request to the application.
     *
     * @param  mixed $request
     * @return void
     */
    public function loginEmployee(Request $request)
    {
        // Validating the request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Return errors
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Get remember me request
        $expire_in = $request->remember_me ?  (24 * 30) /* 30 Days */ : 60;

        // Change guards
        Config::set('auth.defaults.guard', 'employees');

        // // Checking the employee
        // $token = false;
        // $employee = Employee::where('email', '=', $request->email)->first();
        // if (Hash::check($request->password, $employee->password ?? null)) {
        //     $token = \JWTAuth::fromUser($employee);
        // }

        // // Return response unauthorized
        // if (!$token || $employee == null) {
        //     return response()->json(['error' => ['email' => trans('auth.failed')]], 401);
        // }

        // Return response unauthorized
        if (!$token = auth()->setTTL($expire_in)->attempt($validator->validated())) {
            return response()->json(['error' => ['email' => trans('auth.failed')]], 401);
        }

        return $this->createNewToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function employeeProfile()
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
    protected function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}
