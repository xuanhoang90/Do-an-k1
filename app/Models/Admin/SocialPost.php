<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class SocialPost extends Model
{
    protected $guarded = [];
    protected $table = 'social_posts';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(SocialPostComment::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'social_post_likes');
    }
}
