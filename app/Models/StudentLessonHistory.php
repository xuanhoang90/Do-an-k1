<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentLessonHistory extends Model
{
    protected $table = 'student_lesson_histories';

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
