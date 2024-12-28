<?php

namespace App\Http\Controllers\Client;

use App\Models\SocialPost;
use App\Models\SocialPostComment;
use App\Models\SocialPostLike;
use Illuminate\Http\Request;

class SocialPostController
{
    public function getSocialPost(Request $request)
    {
        $socialPost = SocialPost::orderBy('id', 'desc')->get();

        $res = [];
        foreach ($socialPost as $post) {
            $res[] = [
                'id' => $post->id,
                'title' => $post->title,
                'content' => $post->content,
                'thumbnail' => $post->studentLessonHistory->image,
                'created_at' => $post->created_at->format('Y-m-d H:i:s'),
                'student_id' => $post->user_id,
                'student_name' => $post->student->name,
                'student_avatar' => $post->student->profile->avatar,
                'is_liked' => SocialPostLike::isLiked($post->id, $request->user()->id),
            ];
        }

        return response()->json($res);
    }

    public function likePost(Request $request)
    {
        $like = SocialPostLike::where('user_id', $request->user()->id)
            ->where('social_post_id', $request->get('social_post_id'))->first();

        if ($like) {
            $like->delete();
        } else {
            SocialPostLike::create([
                'user_id' => $request->user()->id,
                'social_post_id' => $request->get('social_post_id'),
            ]);
        }

        return response()->json(['success' => 'OK']);
    }
}
