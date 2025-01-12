<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialPost extends Model
{
    protected $table = 'social_posts';

    public function studentLessonHistory()
    {
        return $this->belongsTo(StudentLessonHistory::class, 'student_lesson_history_id');
    }

    public static function hasPostOfStudentHistory($historyId)
    {
        return SocialPost::where('student_lesson_history_id', $historyId)->exists();
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(SocialPostComment::class, 'social_post_id');
    }

    public function likes()
    {
        return $this->hasMany(SocialPostLike::class, 'social_post_id');
    }
}
