<?php

namespace App\Http\Controllers\Client;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'type' => User::TYPE_STUDENT,
            'status' => User::STATUS_ACTIVE,
        ])) {
            $request->session()->regenerate();

            return response()->json([
                'success' => true,
                'message' => 'Logged in successfully',
                'user' => Auth::user(),
                'token' => Auth::user()->createToken('student-api')->plainTextToken,
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Invalid credentials'
        ], 401);
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        $user->tokens()->delete(); // Revoke all tokens for the user
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Logged out successfully'], 200);
    }

    public function getUserInfo(Request $request)
    {
        $userData = User::where(['id' => $request->user()->id])->with('profile')->first();
        $userData->profile->avatar = config('app.url') .'/storage/'. $userData->profile->avatar;
        return response()->json($userData);
    }
}
