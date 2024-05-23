<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Login to get token
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
                'data' => $credentials,
                'token' => $token
            ], 200);
        }

        return response()->json([
            'message' => 'Login unsuccessful'
        ], 400);
    }

    public function register(Request $request) {
        $credentials = $request->validate([
            'username' => 'string|required|unique:users',
            'password' => 'string|required'
        ]);

        if($credentials) {
            /** @var \App\Models\User $user */
            $user = new User($credentials);
            $user->save();

            $token = $user->createToken('apiToken')->plainTextToken;
            return response()->json([
                'messages' => 'Login Success',
                'data' => $credentials,
                'token' => $token
            ], 201);
        }

        return response()->json([
            'message' => 'Register unsuccessful'
        ], 400);
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        /** @var \App\Models\User $user */
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'messages' => 'Logout successful'
        ], 200);
    }
}
