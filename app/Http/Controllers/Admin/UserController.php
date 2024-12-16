<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\Admin\User;

class UserController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->where('status','!=',3)->get();

        return view('modules.user.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modules.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->status = $request->status;

        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'User created successfully!');
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
        $user = User::findOrFail($id);

        return view('modules.user.edit', [
            'id' => $id,
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;

        if(!empty($request->password)) {
            $request->validate([
                'password' => 'required|confirmed|min:8'
            ], [
                'password.required' => 'Please fill your password.',
                'password.confirmed' => 'Confirmation password doen\'n match.'
            ]);

            $user->password = bcrypt($request->password);
        }

        $user->status = $request->status;
        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $user = User::findOrFail($id);

        $user->status = 3;

        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'User deleted successfully!');
    }
}
