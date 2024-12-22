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
        return response()->json(Category::orderBy('id', 'desc')->all());
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

        return response()->json($lesson);
    }
}
