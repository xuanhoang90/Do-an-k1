<?php

namespace App\Http\Controllers\Client;

use App\Events\NewComment;
use App\Models\SocialPost;
use App\Models\SocialPostComment;
use App\Models\SocialPostLike;
use Illuminate\Http\Request;


class SocialPostController
{
    public function getSocialPost(Request $request)
    {
        $socialPost = SocialPost::where('status','1')
        ->orderBy('id', 'desc')
        ->get();
        
        $res = [];
        foreach ($socialPost as $post) {
            $res[] = [
                'id' => $post->id,
                'title' => $post->title,
                'content' => $post->content,
                'felling' => $post->felling,
                'thumbnail' => $post->studentLessonHistory->image,
                'created_at' => $post->created_at->format('Y-m-d H:i:s'),
                'student_id' => $post->user_id,
                'student_name' => $post->student->name,
                'student_avatar' => $post->student->profile->avatar,
                'is_liked' => SocialPostLike::isLiked($post->id, $request->user()->id),
                'like_count' => $post->likes->count(),
                'comment_count' => $post->comments->count(),
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

    public function getSocialPostComments(Request $request)
    {
        $comments = SocialPostComment::where('social_post_id', $request->get('social_post_id'))
            ->where('parent_id', 0)
            ->orderBy('id', 'asc')
            ->get();

        $res = [];
        foreach ($comments as $comment) {
            $subComments = SocialPostComment::where('social_post_id', $request->get('social_post_id'))
                ->where('parent_id', $comment->id)
                ->orderBy('id', 'asc')
                ->get();
            
            $subCommentData = [];
            foreach ($subComments as $sub) {
                $subCommentData[] = [
                    'id' => $sub->id,
                    'social_post_id' => $sub->social_post_id,
                    'parent_id' => $sub->parent_id,
                    'content' => $sub->content,
                    'created_at' => $sub->created_at->format('Y-m-d H:i:s'),
                    'student_id' => $sub->user_id,
                    'student_name' => $sub->user->name,
                    'student_avatar' => $sub->user->profile->avatar,
                ];
            }

            $res[] = [
                'id' => $comment->id,
                'social_post_id' => $comment->social_post_id,
                'parent_id' => $comment->parent_id,
                'content' => $comment->content,
                'created_at' => $comment->created_at->format('Y-m-d H:i:s'),
                'student_id' => $comment->user_id,
                'student_name' => $comment->user->name,
                'student_avatar' => $comment->user->profile->avatar,
                'sub_comments' => $subCommentData
            ];
        }

        return response()->json($res);
    }

    public function addSocialPostComment(Request $request)
    {
        $comment = SocialPostComment::create([
            'user_id' => $request->user()->id,
            'social_post_id' => $request->get('social_post_id'),
            'content' => $request->get('content'),
            'parent_id' => $request->get('parent_id', 0),
        ]);

        broadcast(new NewComment($comment))->toOthers();

        return response()->json(['success' => 'OK']);
    }
}

