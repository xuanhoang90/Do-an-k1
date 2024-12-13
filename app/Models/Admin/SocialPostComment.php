<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class SocialPostComment extends Model
{
    protected $guarded = [];
    protected $table = 'social_post_comments';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function socialPost()
    {
        return $this->belongsTo(SocialPost::class);
    }

    public function parent()
    {
        return $this->belongsTo(SocialPostComment::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(SocialPostComment::class, 'parent_id');
    }
}
