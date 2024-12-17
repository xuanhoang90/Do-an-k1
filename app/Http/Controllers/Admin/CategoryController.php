<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Category;
use App\Models\Admin\National;
use Illuminate\Http\Request;

class CategoryController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('national')->get();
        $nationals = National::all();
        return view('modules.category.index', compact('categories','nationals'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nationals = National::all();
       
        return view('modules.category.create',[
            'nationals' => $nationals
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg',
           
        ]);

        $filename = null;
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/category'), $filename);
        }
     
        Category::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'thumbnail' => $filename,
            'status' => $request->status,
            'national_id' => $request->national_id,
        ]);

        return redirect()
            ->route('admin.category.index')
            ->with('success', 'Category created successfully!');
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
        $category = Category::findOrFail($id);
        $nationals = National::all();
        return view('modules.category.edit', compact('category', 'nationals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        $filename = $category->thumbnail; 
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');

          
            $old_thumbnail = public_path('uploads/category/' . $category->thumbnail);
            if (file_exists($old_thumbnail)) {
                unlink($old_thumbnail);
            }

            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/category'), $filename);
        }

        $category->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'thumbnail' => $filename,
            'status' => $request->status,
            'national_id' => $request->national_id,
        ]);

        return redirect()
            ->route('admin.category.index')
            ->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        
        $old_thumbnail = public_path('uploads/category/' . $category->thumbnail);
        if (file_exists($old_thumbnail)) {
            unlink($old_thumbnail);
        }

        $category->delete();

        return redirect()
            ->route('admin.category.index')
            ->with('success', 'Category deleted successfully!');
    }
}
