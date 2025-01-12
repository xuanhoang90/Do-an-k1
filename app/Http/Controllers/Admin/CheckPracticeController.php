<?php

namespace App\Http\Controllers\Admin;


use App\Models\SocialPost;
use App\Models\StudentLessonHistory;

use App\Models\User;
use App\Events\AdminRespondedPost;
class CheckPracticeController
{

    public function showPost()
    {
        $posts = SocialPost::with('student')->get();

        return view('admin.post.index', [
            'posts' => $posts,
        ]);
    }

    public function approvePost($postId)
    {
       
        $post = SocialPost::with('student')->findOrFail($postId);
        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }
        if ($post->student && $post->student->type === User::TYPE_STUDENT) {
        $post->status = SocialPost::STATUS_APPROVED;
        $post->save();
       
        event(new AdminRespondedPost($post));
        

        
    return response()->json(['success' => true, 'message' => 'Post approved successfully.']);
    }
    return response()->json([
        'success' => false,
        'message' => 'User associated with this post is not a student or does not exist.',
    ], 400);
}


public function rejectPost($postId)
{

    $post = SocialPost::with('student')->findOrFail($postId);

    $post->delete();

    $lessonHistory = StudentLessonHistory::find($post->student_lesson_history_id);
    if ($lessonHistory) {
        $lessonHistory->delete();
    }

    if ($post->studentLessonHistory && $post->studentLessonHistory->lesson) {
        $lesson = $post->studentLessonHistory->lesson;
        $lesson->update(['status' => 'not_learned']);
    }
   
    return response()->json(['success' => true, 'message' => 'The post has been successfully rejected and deleted.']);
}



}
