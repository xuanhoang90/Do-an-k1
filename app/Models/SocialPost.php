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
}
