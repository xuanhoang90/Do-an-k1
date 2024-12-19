<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateLevelRequest;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $levels = Level::orderBy('id', 'desc')->get();
        return view('admin.level.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.level.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateLevelRequest $request)
    {
        $level = new Level();
        $level->name = $request->get('name');
        $level->description = $request->get('description');
        $level->save();

        return redirect()->route('admin.level.index')->with('success', 'Level created successfully');
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
        $level = Level::findOrFail($id);

        return view('admin.level.edit', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $level = Level::findOrFail($id);
        $level->name = $request->get('name');
        $level->description = $request->get('description');
        $level->save();

        return redirect()->route('admin.level.index')->with('success', 'Level updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
