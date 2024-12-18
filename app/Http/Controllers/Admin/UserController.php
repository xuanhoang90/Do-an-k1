<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateUserRequest;
use App\Models\Level;
use App\Models\National;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class UserController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->with(['profile'])->get();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nationals = National::all();
        $levels = Level::all();

        return view('admin.user.create', compact('nationals', 'levels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        $user = new User();
        $user->name = $request->get('name') ?? 'NO NAME';
        $user->email = $request->get('email');
        $user->password =  bcrypt($request->get('password'));
        $user->save();

        if (!empty($user)) {
            $profile = new Profile();
            $profile->user_id = $user->id;
            $profile->display_name = $request->get('display_name');
            $profile->phone_number = $request->get('phone_number');
            $profile->level_id = $request->get('level_id');
            $profile->national_id = $request->get('national_id');
            $profile->save();
        }

        return redirect()->route('admin.user.index')->with('success', 'User created successfully.');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
