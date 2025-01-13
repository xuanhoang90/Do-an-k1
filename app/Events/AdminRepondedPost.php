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

  public function broadcastOn()
  {
    return ['my-channel'];
  }

public function broadcastAs(){
    return  'my-confirmed';
}

  public function broadcastWith(){
    return [
      'id' => $this->post->id,
      'title' => $this->post->title,
      'content' => $this->post->content,
      'thumbnail' => optional($this->post->studentLessonHistory)->image,
      'created_at' => $this->post->created_at->format('Y-m-d H:i:s'),
      'student_id' => $this->post->user_id,
      'type' => $this->post->type,
      'student_name' => optional($this->post->student)->name,
      'student_avatar' => optional($this->post->student->profile)->avatar,
      'is_liked' => false,
  ];
  }
  
}
