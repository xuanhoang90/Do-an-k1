<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialPost extends Model
{
    const STATUS_SHOW = 2;
    const STATUS_HIDE = 1;
    const TYPE_APPROVED =2;
    const TYPE_REJECTED =3;
    const TYPE_PENDING = 1;
    
    protected $table='social_posts';
    

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
