<?php

namespace App\Http\Controllers\Admin;;

use App\Models\Admin\National;
use Illuminate\Http\Request;

class NationalController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nationals = National::all();
        return view('modules.national.index',[
            'nationals' => $nationals
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modules.national.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $national = new National($request->all());
        $national->save();
        return redirect()->route('modules.national.index')->with('success', 'Add National Success!');
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
    public function edit($id)
    {
        $national = National::findOrFail($id);
        return view('modules.national.edit', compact('national'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $national = National::findOrFail($id);
        $national->update($request->all());
        return redirect()->route('modules.national.index')->with('success', 'Update National Success!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $national = National::findOrFail($id)->with('categories');
        if ($national->categories->count() > 0) {
            return redirect()->route('modules.national.index')->with('error', 'Cannot delete National because it has related categories!');
        }
        $national->delete();
        return redirect()->route('modules.national.index')->with('success', 'Delete National Success!');
    }
}
