<?php

namespace App\Http\Controllers\Admin;

<<<<<<< HEAD
use App\Http\Requests\Admin\CreateLessonRequest;
use App\Models\Category;
use App\Models\Lesson;
use App\Models\LessonSample;
use App\Models\Level;
use App\Models\National;
=======
use App\Models\Admin\Level;
use App\Models\Admin\Lesson;
use App\Models\Admin\Category;

>>>>>>> 01ce354e1fc89bb1b36d0b823ec8f438cb25201b
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LessonController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
<<<<<<< HEAD
        $query = Lesson::orderBy('id', 'desc');

        if ($request->has('q')) {
            $query->where('title', 'LIKE', "%{$request->get('q')}%")
                ->orWhere('short_description', 'LIKE', "%{$request->get('q')}%");
        }

        $lessons = $query->get();

        return view('admin.lesson.index', compact('lessons'));
=======
        $lessons = Lesson::with('level')->get();
        $levels = Level::all();
        $categories = Category::all();
        return view('modules.lesson.index', compact('lessons', 'levels','categories'));
>>>>>>> 01ce354e1fc89bb1b36d0b823ec8f438cb25201b
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
<<<<<<< HEAD
        $nationals = National::all();
        $levels = Level::all();
        $categories = Category::all();

        return view('admin.lesson.create', compact('nationals', 'levels', 'categories'));
=======
        $levels = Level::all();
        $categories = Category::all();
      
        return view('modules.lesson.create', compact('levels','categories'));

>>>>>>> 01ce354e1fc89bb1b36d0b823ec8f438cb25201b
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateLessonRequest $request)
    {
<<<<<<< HEAD
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
=======


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
                'level_id' => 1,
                'category_id' => $request->category_id,
            ]);

          
            return redirect()
                ->route('admin.lesson.index')
                ->with('success', 'Lesson created successfully!');
>>>>>>> 01ce354e1fc89bb1b36d0b823ec8f438cb25201b
        }

        $lesson->save();

        $this->uploadSamples($lesson, $request);

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
<<<<<<< HEAD
    public function edit(string $id)
    {
        $lesson = Lesson::findOrFail($id);
        $nationals = National::all();
        $levels = Level::all();
        $categories = Category::all();

        return view('admin.lesson.edit', compact('lesson', 'nationals', 'levels', 'categories'));

    }
=======
    public function edit($id)
{
    $lesson = Lesson::with(['category', 'level'])->findOrFail($id);
    $categories = Category::all(); // Lấy danh sách categories
    $levels = Level::all();        // Lấy danh sách levels

    return view('modules.lesson.edit', compact('lesson', 'categories', 'levels'));
}
>>>>>>> 01ce354e1fc89bb1b36d0b823ec8f438cb25201b

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

        $this->uploadSamples($lesson, $request);

        return redirect()->route('admin.lesson.index')->with('success', 'Lesson updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function uploadSamples(Lesson $lesson, Request $request)
    {
        if ($request->hasFile('samples')) {
            $samples = $request->file('samples');

            LessonSample::where(['lesson_id' => $lesson->id])->delete();

            foreach ($samples as $sample) {
                $samplePath = $sample->store('samples', 'public');
                $lessonSample = new LessonSample();
                $lessonSample->lesson_id = $lesson->id;
                $lessonSample->thumbnail = $samplePath;
                $lessonSample->save();
            }
        }
    }
}
