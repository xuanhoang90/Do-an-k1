<?php

namespace App\Http\Controllers\Client;

use App\Models\StudentLessonHistory;
use Illuminate\Http\Request;

class PracticeController
{
    public function savePractice(Request $request)
    {
        $user = $request->user();

        $studentLessonHistory = new StudentLessonHistory();
        $studentLessonHistory->user_id = $user->id;
        $studentLessonHistory->lesson_id = $request->get('lesson_id');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // Đặt tên file
            $studentLessonHistory->image = $image->storeAs('lesson_histories', $imageName, 'public');
        }

        $studentLessonHistory->save();

        return response()->json(['success' => 'OK']);
    }

    public function getPracticeHistories(Request $request)
    {
        $user = $request->user();

        $histories = StudentLessonHistory::where('user_id', $user->id)->with('lesson')->orderBy('id', 'desc')->get();

        foreach ($histories as $history) {
            $history->image = config('app.url') .'/storage/'. $history->image;
        }

        return response()->json($histories);
    }
}
