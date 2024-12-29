<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialPostComment extends Model
{
    protected $table = 'social_post_comments';

    protected $fillable = [
        'user_id',
        'social_post_id',
        'content',
        'parent_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
