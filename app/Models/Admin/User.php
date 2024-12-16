<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $guarded = [];
    protected $fillable = [
        'name',
        'email',
        'password',
        'status' ,
        'type'
    ];
    public function socialPosts()
    {
        return $this->hasMany(SocialPost::class);
    }

    public function socialPostComments()
    {
        return $this->hasMany(SocialPostComment::class);
    }

    public function socialPostLikes()
    {
        return $this->belongsToMany(SocialPost::class, 'social_post_likes');
    }

    public function lessonHistories()
    {
        return $this->hasMany(LessonHistory::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
