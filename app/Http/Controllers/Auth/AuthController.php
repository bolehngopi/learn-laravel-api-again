<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Login user and create token for user
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'string|required',
            'password' => 'string|required'
        ]);

        if (Auth::attempt($credentials)) {
            /** @var \App\Models\User $user */
            $user = Auth::user();
            $token = $user->createToken('apiToken')->plainTextToken;
            return response()->json([
                'messages' => 'Login Success',
                'data' => UserResource::make($user),
                'token' => $token
            ], 200);
        }

        return response()->json([
            'message' => 'Login unsuccessful'
        ], 400);
    }

    /**
     * Register user and create token for user
     */
    public function register(Request $request) {
        $credentials = $request->validate([
            'username' => 'string|required|unique:users',
            'password' => 'string|required',
            'isAdmin' => 'boolean'
        ]);

        if($credentials) {
            /** @var \App\Models\User $user */
            $user = new User($credentials);
            $user->save();

            $token = $user->createToken('apiToken')->plainTextToken;
            return response()->json([
                'messages' => 'Login Success',
                'data' => UserResource::make($user),
                'token' => $token
            ], 201);
        }

        return response()->json([
            'message' => 'Register unsuccessful'
        ], 400);
    }

    /**
<<<<<<< HEAD
     * Logout user and delete token for user
=======
     * Logout
>>>>>>> dev
     * @authenticated
     */
    public function logout(Request $request)
    {
        /** @var \App\Models\User $user */
        $token = $request->user()->currentAccessToken()->delete();

        if (!$token) {
            return response()->json([
                'message' => 'Logout unsuccessful'
            ], 400);
        }

        return response()->json([
            'messages' => 'Logout successful'
        ], 200);
    }
}
