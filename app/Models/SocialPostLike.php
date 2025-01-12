<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialPostLike extends Model
{
    protected $table = 'social_post_likes';

    protected $fillable = [
        'user_id',
        'social_post_id',
    ];

    public static function isLiked($postId, $userId)
    {
        return SocialPostLike::where('social_post_id', $postId)
            ->where('user_id', $userId)
            ->exists();
    }
}
