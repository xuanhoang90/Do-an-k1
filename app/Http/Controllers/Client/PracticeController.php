<?php

namespace App\Http\Controllers\Client;

use App\Events\NewPost;
use App\Models\SocialPost;
use App\Models\StudentLessonHistory;
use Illuminate\Http\Request;

class PracticeController
{
    public function savePractice(Request $request)
    {
        $user = $request->user();

        $studentLessonHistory = null;
        if ($request->has('practice_history_id')) {
            $studentLessonHistory = StudentLessonHistory::find($request->get('practice_history_id'));
        }

        if (empty($studentLessonHistory)) {
            $studentLessonHistory = new StudentLessonHistory();
        }

        $studentLessonHistory->user_id = $user->id;
        $studentLessonHistory->lesson_id = $request->get('lesson_id');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // Đặt tên file
            $studentLessonHistory->image = $image->storeAs('lesson_histories', $imageName, 'public');
        }

        $studentLessonHistory->save();

        if ($request->has('share_after_save') && $request->share_after_save) {
            $this->shareToSocial($studentLessonHistory);
        }

        $studentLessonHistory->image = config('app.url') .'/storage/'. $studentLessonHistory->image;

        return response()->json(['success' => 'OK', 'data' => $studentLessonHistory]);
    }

    private function shareToSocial($history)
    {
        if (SocialPost::hasPostOfStudentHistory($history->id)) {
            return;
        }

        $socialPost = new SocialPost();
        $socialPost->user_id = $history->user_id;
        $socialPost->student_lesson_history_id = $history->id;
        $socialPost->title = 'I just completed the practice of ' . $history->lesson->title;
        $socialPost->content = $history->lesson->short_description;
        $socialPost->save();

        broadcast(new NewPost($socialPost))->toOthers();
    }

    public function getPracticeHistories(Request $request)
    {
        $user = $request->user();
        $query = StudentLessonHistory::where('user_id', $user->id);

        if ($request->has('lesson_id')) {
            $query->where('lesson_id', $request->get('lesson_id'));
        }

        $histories = $query->where('status', StudentLessonHistory::STATUS_ACTIVE)
            ->with('lesson')
            ->orderBy('id', 'desc')->get();

        foreach ($histories as $history) {
            $history->image = config('app.url') .'/storage/'. $history->image;
        }

        return response()->json($histories);
    }

    public function removePracticeHistory(Request $request)
    {
        $user = $request->user();
        $historyId = $request->get('history_id');

        $history = StudentLessonHistory::where(['user_id' => $user->id, 'id' => $historyId])->first();

        if (!empty($history)) {
            $history->hideHistory();
            return response()->json(['success' => 'OK']);
        }

        return response()->json(['error' => 'Not found'], 404);
    }

    public function sharePractice(Request $request)
    {
        $practiceHistory = StudentLessonHistory::findOrFail($request->get('id'));
        $this->shareToSocial($practiceHistory);

        return response()->json(['success' => 'OK']);
    }
}
