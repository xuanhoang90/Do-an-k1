<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $guarded = [];
    protected $table = 'lessons';

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function lessonHistories()
    {
        return $this->hasMany(LessonHistory::class);
    }
}
