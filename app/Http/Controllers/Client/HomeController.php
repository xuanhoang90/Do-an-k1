<?php

namespace App\Http\Controllers\Client;

use App\Models\Category;
use App\Models\Lesson;
use App\Models\Level;
use App\Models\National;
use Illuminate\Http\Request;

class HomeController
{
    public function getCategories()
    {
        return response()->json(Category::orderBy('id', 'desc')->get());
    }

    public function getNationals()
    {
        return response()->json(National::select(['id', 'name', 'slug'])->orderBy('id', 'asc')->get()->toArray());
    }

    public function getLevels()
    {
        return response()->json(Level::select(['id', 'name'])->orderBy('id', 'asc')->get()->toArray());
    }

    public function getLessonData(string $slug)
    {
        $lesson = Lesson::where('slug', $slug)->first();

        if (!$lesson) {
            return response()->json(['message' => 'Lesson not found'], 404);
        }

        $lesson->thumbnail = config('app.url') .'/storage/'. $lesson->thumbnail;

        $lesson->samples = [];
        foreach ($lesson->lessonSamples as $sample) {
            $sample->thumbnail = config('app.url') .'/storage/'. $sample->thumbnail;
            $lesson->samples[] = $sample;
        }

        return response()->json($lesson);
    }

    public function getLessons(Request $request)
    {
        $query = Lesson::query();

        if ($request->has('language')) {
            $national = National::where(['slug' => $request->get('language')])->first();
            $query->where('national_id', $national->id);
        }

        if ($request->has('category')) {
            $query->where('category_id', $request->get('category'));
        }

        if ($request->has('level')) {
            $query->where('level_id', $request->get('level'));
        }

        $lessons = $query->orderBy('id', 'desc')->paginate(10);

        foreach ($lessons as $lesson) {
            $lesson->thumbnail = config('app.url') .'/storage/'. $lesson->thumbnail;
        }

        return response()->json($lessons);
    }
}
