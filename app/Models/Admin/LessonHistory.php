<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class LessonHistory extends Model
{
    protected $guarded = [];
    protected $table = 'lesson_histories';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
