<?php

namespace App\Http\Controllers\Admin;

<<<<<<< HEAD
use App\Http\Requests\Admin\CreateCategoryRequest;
use App\Models\Category;
=======
use App\Models\Admin\Category;
use App\Models\Admin\National;
>>>>>>> 01ce354e1fc89bb1b36d0b823ec8f438cb25201b
use Illuminate\Http\Request;

class CategoryController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
<<<<<<< HEAD
        $query = Category::orderBy('id', 'desc');

        if ($request->has('q')) {
            $query->where('name', 'LIKE', "%{$request->get('q')}%")
                ->orWhere('description', 'LIKE', "%{$request->get('q')}%");
        }

        $categories = $query->get();
        return view('admin.category.index', compact('categories'));
=======
        $categories = Category::with('national')->get();
        $nationals = National::all();
        return view('modules.category.index', compact('categories','nationals'));
>>>>>>> 01ce354e1fc89bb1b36d0b823ec8f438cb25201b
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
<<<<<<< HEAD
        return view('admin.category.create');
=======
        $nationals = National::all();
       
        return view('modules.category.create',[
            'nationals' => $nationals
        ]);
>>>>>>> 01ce354e1fc89bb1b36d0b823ec8f438cb25201b
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->get('name');
        $category->description = $request->get('description');

<<<<<<< HEAD
=======
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg',
           
        ]);

        $filename = null;
>>>>>>> 01ce354e1fc89bb1b36d0b823ec8f438cb25201b
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = time(). '.'. $image->getClientOriginalExtension();
            $thumbnailPath = $image->storeAs('categories', $imageName, 'public');
            $category->thumbnail = $thumbnailPath;
        }
<<<<<<< HEAD

        $category->save();
=======
     
        Category::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'thumbnail' => $filename,
            'status' => $request->status,
            'national_id' => $request->national_id,
        ]);
>>>>>>> 01ce354e1fc89bb1b36d0b823ec8f438cb25201b

        return redirect()->route('admin.category.index')->with('success', 'Category created successfully!');
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
        $category = Category::findOrFail($id);
<<<<<<< HEAD

        return view('admin.category.edit', compact('category'));
=======
        $nationals = National::all();
        return view('modules.category.edit', compact('category', 'nationals'));
>>>>>>> 01ce354e1fc89bb1b36d0b823ec8f438cb25201b
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->get('name');
        $category->description = $request->get('description');

<<<<<<< HEAD
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = time(). '.'. $image->getClientOriginalExtension();
            $thumbnailPath = $image->storeAs('categories', $imageName, 'public');
            $category->thumbnail = $thumbnailPath;
        }

        $category->save();
=======
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
>>>>>>> 01ce354e1fc89bb1b36d0b823ec8f438cb25201b

        return redirect()->route('admin.category.index')->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function hideCategory(string $id)
    {
        $category = Category::findOrFail($id);
        $category->hideCategory();

<<<<<<< HEAD
        return redirect()->route('admin.category.index')->with('success', 'Category hidden successfully!');
    }
=======
        
        $old_thumbnail = public_path('uploads/category/' . $category->thumbnail);
        if (file_exists($old_thumbnail)) {
            unlink($old_thumbnail);
        }
>>>>>>> 01ce354e1fc89bb1b36d0b823ec8f438cb25201b

    public function showCategory(string $id)
    {
        $category = Category::findOrFail($id);
        $category->showCategory();

        return redirect()->route('admin.category.index')->with('success', 'Category shown successfully!');
    }
}
