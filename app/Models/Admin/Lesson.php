<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $guarded = [];
    protected $fillable = ['name', 'content', 'short_description', 'thumbnail', 'sample_image', 'status', 'level_id','category_id'];
    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id', 'id');
    }

    public function lessonHistories()
    {
        return $this->hasMany(LessonHistory::class);
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
