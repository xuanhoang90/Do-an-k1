<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentLessonHistory extends Model
{
    protected $table = 'student_lesson_histories';

    const STATUS_ACTIVE = 1;
    const STATUS_HIDE = 2;

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function hideHistory()
    {
        $this->status = self::STATUS_HIDE;
        $this->save();
    }

    public static function isLearnedLesson($userId, $lessonId)
    {
        return StudentLessonHistory::where('user_id', $userId)
            ->where('lesson_id', $lessonId)
            ->where('status', self::STATUS_ACTIVE)
            ->exists();
    }
}
