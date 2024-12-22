<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests\Client\UpdateUserRequest;
use App\Models\Profile;
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

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' =>'required|string|max:255',
            'email' =>'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'type' => User::TYPE_STUDENT,
        ]);

        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->display_name = $user->name;
        $profile->avatar = $avatarPath ?? '';
        $profile->level_id = 1;
        $profile->national_id = 1;
        $profile->save();

        return response()->json(['success' => 'OK']);
    }

    public function update(UpdateUserRequest $request)
    {
        $user = $request->user();
        $user->name = $request->get('name');
        $user->save();

        $profile = $user->profile;

        $avatarPath = $user->profile->avatar;
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // Đặt tên file
            $avatarPath = $image->storeAs('avatars', $imageName, 'public');
        }

        $profile->avatar = $avatarPath ?? '';
        $profile->display_name = $request->get('name');
        $profile->phone_number = $request->get('phone_number');
        $profile->address = $request->get('address');
        $profile->level_id = $request->get('level_id');
        $profile->national_id = $request->get('national_id');
        $profile->save();

        return response()->json(['success' => 'OK']);
    }
}
