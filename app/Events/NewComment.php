<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewComment implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $comment;

    public function __construct($comment)
    {
        $this->comment = [
            'id' => $comment->id,
            'social_post_id' => $comment->social_post_id,
            'parent_id' => $comment->parent_id,
            'content' => $comment->content,
            'created_at' => $comment->created_at->format('Y-m-d H:i:s'),
            'student_id' => $comment->user_id,
            'student_name' => $comment->user->name,
            'student_avatar' => $comment->user->profile->avatar,
            'sub_comments' => []
        ];
    }

    public function broadcastOn()
    {
        return ['comment-channel-' . $this->comment['social_post_id']];
    }

    public function broadcastAs()
    {
        return 'new-comment';
    }
}
