<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateLessonRequest;
use App\Models\Category;
use App\Models\Lesson;
use App\Models\Level;
use App\Models\National;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LessonController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Lesson::orderBy('id', 'desc');

        if ($request->has('q')) {
            $query->where('title', 'LIKE', "%{$request->get('q')}%")
                ->orWhere('short_description', 'LIKE', "%{$request->get('q')}%");
        }

        $lessons = $query->get();

        return view('admin.lesson.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nationals = National::all();
        $levels = Level::all();
        $categories = Category::all();

        return view('admin.lesson.create', compact('nationals', 'levels', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateLessonRequest $request)
    {
        $lesson = new Lesson();
        $lesson->title = $request->get('title');
        $lesson->short_description = $request->get('short_description');
        $lesson->content = $request->get('content');
        $lesson->level_id = $request->get('level_id');
        $lesson->national_id = $request->get('national_id');
        $lesson->category_id = $request->get('category_id');
        $lesson->slug = Str::slug($request->get('title'));

        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $lesson->thumbnail = $thumbnailPath;
        }

        $lesson->save();

        return redirect()->route('admin.lesson.index')->with('success', 'Lesson created successfully.');
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
        $lesson = Lesson::findOrFail($id);
        $nationals = National::all();
        $levels = Level::all();
        $categories = Category::all();

        return view('admin.lesson.edit', compact('lesson', 'nationals', 'levels', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lesson = Lesson::findOrFail($id);
        $lesson->title = $request->get('title');
        $lesson->short_description = $request->get('short_description');
        $lesson->content = $request->get('content');
        $lesson->level_id = $request->get('level_id');
        $lesson->national_id = $request->get('national_id');
        $lesson->category_id = $request->get('category_id');
        $lesson->slug = Str::slug($request->get('title'));

        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $lesson->thumbnail = $thumbnailPath;
        }

        $lesson->save();

        return redirect()->route('admin.lesson.index')->with('success', 'Lesson updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
