<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AdminRepondedPost implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $post;
    /**
     * Create a new event instance.
     */
    public function __construct($post)
    {
        $this->post = $post;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [new Channel('my-channel')];
    }

    public function broadcastAs(){
        return 'new-post';
    }

    public function broadcastWith(){
        return [
            'post_id' => $this->post->id,
            'status' => $this->post->status,
            'user_id' => $this->post->user_id, // Gửi user_id để client xác định
            'message' => $this->post->status === 1
                ? 'Your post has been approved.'
                : 'Your post has been rejected.',
        ];
    }
}
