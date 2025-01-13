<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewPost implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $post;

    public function __construct($post)
    {
        $this->post = [
            'id' => $post->id,
            'title' => $post->title,
            'content' => $post->content,
            'thumbnail' => $post->studentLessonHistory->image,
            'created_at' => $post->created_at->format('Y-m-d H:i:s'),
            'student_id' => $post->user_id,
            'student_name' => $post->student->name,
            'student_avatar' => $post->student->profile->avatar,
            'type' => $post->type,
            'is_liked' => false,
            'like_count' => 0,
            'comment_count' => 0,
        ];
    }

    public function broadcastOn()
    {
        return ['social-channel'];
    }

    public function broadcastAs()
    {
        return 'new-post';
    }
}
