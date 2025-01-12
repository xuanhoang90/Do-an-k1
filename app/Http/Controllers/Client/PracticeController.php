<?php

namespace App\Http\Controllers\Client;

use App\Events\NewPost;
use App\Models\SocialPost;
use App\Models\User;
use App\Models\StudentLessonHistory;
use App\Events\UserSharedPost;


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

        $studentLessonHistory->user_id = $request->user()->id;
        $studentLessonHistory->lesson_id = $request->get('lesson_id');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // Đặt tên file
            $studentLessonHistory->image = $image->storeAs('lesson_histories', $imageName, 'public');
        }

        $studentLessonHistory->save();

        if ($request->boolean('share_after_save')) {
            $this->shareToSocial($studentLessonHistory, $request->only(['title', 'content', 'feeling']));
        }

        $studentLessonHistory->image = config('app.url') . '/storage/' . $studentLessonHistory->image;

        return response()->json(['success' => 'OK', 'data' => $studentLessonHistory]);
    }

    private function shareToSocial($history,$input)
    {
        $existingPost = SocialPost::where('student_lesson_history_id', $history->id)->first();

        if ($existingPost && $existingPost->status == 1) {
            broadcast(new NewPost($existingPost))->toOthers();
            return;
        }

        $socialPost = $existingPost ?? new SocialPost();
        $socialPost->user_id = $history->user_id;
        $socialPost->student_lesson_history_id = $history->id;

        $socialPost->title = $input['title'];
        $socialPost->content =  $input['content'];
        $socialPost->feeling = $input['feeling'];
        $socialPost->status = 2;
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
            $history->image = config('app.url') . '/storage/' . $history->image;
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
        $input = $request->only(['title', 'content', 'feeling']);
        $this->shareToSocial($practiceHistory, $input);

        return response()->json(['success' => 'OK']);

    }

    
    


}
