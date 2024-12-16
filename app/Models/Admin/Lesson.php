<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $guarded = [];
    protected $fillable = ['name', 'content', 'short_description', 'thumbnail', 'sample_image', 'status', 'level_id'];
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function lessonHistories()
    {
        return $this->hasMany(LessonHistory::class);
    }
}
