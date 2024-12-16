<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Level;
use App\Models\Admin\Lesson;

use Illuminate\Http\Request;

class LessonController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons = Lesson::with('level')->get();
        $levels = Level::all();
        return view('modules.lesson.index', compact('lessons', 'levels'));
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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required',
            'short_description' => 'required|string|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif',
            'sample_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'status' => 'required',
        ]

    );
            

        if ($request->hasFile('thumbnail')) {
            $thumbnail = 'uploads/lessons/thumbnail/' . uniqid() . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $request->file('thumbnail')->move(public_path('uploads/lessons/thumbnail'), basename($thumbnail));

            $sampleImages = [];
            if ($request->hasFile('sample_images')) {
                foreach ($request->file('sample_images') as $file) {
                    $path = 'uploads/lessons/sample_images/' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('uploads/lessons/sample_images'), basename($path));
                    $sampleImages[] = $path;
                }
            }

            Lesson::create([
                'name' => $validated['name'],
                'content' => $validated['content'],
                'short_description' => $validated['short_description'],
                'thumbnail' => $thumbnail,
                'sample_image' => json_encode($sampleImages),
                'status' => $validated['status'],

            ]);
            return redirect()
                ->route('admin.lesson.index')
                ->with('success', 'Lesson created successfully!');
        }
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
        $lesson = Lesson::with('level')->findOrFail($id);

        return view('modules.lession.edit', compact('lesson', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $lesson = Lesson::with('level')->findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required',
            'short_description' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|',
            'sample_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',

        ]);

        if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {

            if ($lesson->thumbnail && file_exists(public_path($lesson->thumbnail))) {
                unlink(public_path($lesson->thumbnail));
            }
            $thumbnailPath = 'uploads/lessons/' . time() . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $request->file('thumbnail')->move(public_path('uploads/lessons'), basename($thumbnailPath));
            $lesson->thumbnail = $thumbnailPath;
        }

        if ($request->hasFile('sample_image') && $request->file('sample_image')->isValid()) {
            if ($lesson->sample_image && file_exists(public_path($lesson->sample_image))) {
                unlink(public_path($lesson->sample_image));
            }

            $sampleImagePath = 'uploads/lesson/sample_images/' . time() . '.' . $request->file('sample_image')->getClientOriginalExtension();
            $request->file('sample_image')->move(public_path('uploads/lesson/sample_images'), basename($sampleImagePath));
            $lesson->sample_image = $sampleImagePath;
        }

        $lesson->update([
            'name' => $validated['name'],
            'content' => $validated['content'],
            'short_description' => $validated['short_description'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('modules.lesson.index')->with('success', 'Lesson updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lesson = Lesson::findOrFail($id);

        if ($lesson->thumbnail && file_exists(public_path($lesson->thumbnail))) {
            unlink(public_path($lesson->thumbnail));
        }

        if ($lesson->sample_image && file_exists(public_path($lesson->sample_image))) {
            unlink(public_path($lesson->sample_image));
        }

        $lesson->delete();

        return redirect()->route('admin.lesson.index')->with('success', 'Lesson deleted successfully!');
    }
}
