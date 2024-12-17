<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Profile;
use App\Models\Admin\User;
use Illuminate\Http\Request;

class ProfileController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        dd($user);
        // return view('modules.profile.index', [
        //     'profile' => $profile
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $profile = Profile::find($id);  // Lấy thông tin profile
        // $user = $profile->user; 
        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'phone_number' => 'required|string|max:20',
            'level_id' => 'required|exists:levels,id',
            'avatar' => 'nullable|image|max:2048',
        ]);

        $profile = Profile::find($id);  // Lấy thông tin profile
        $user = $profile->user;

        $profile->phone_number = $request->phone_number;
        $profile->level_id = $request->level_id;

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $profile->avatar = $avatarPath;
        }

        $profile->save();

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
