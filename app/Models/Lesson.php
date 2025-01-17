<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'lessons';

    const STATUS_SHOW = 1;
    const STATUS_HIDE = 2;

    public $samples;
    public $isLearned;

    protected $fillable = [
        'title',
        'description',
        'status',
        'national_id',
        'category_id',
        'level_id',
    ];

    public function getStatusName()
    {
        $status = [
            self::STATUS_SHOW => 'Show',
            self::STATUS_HIDE => 'Hide',
        ];

        return array_key_exists($this->status, $status) ? $status[$this->status] : 'Unknown';
    }

    public function national()
    {
        return $this->belongsTo(National::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function lessonSamples()
    {
        return $this->hasMany(LessonSample::class);
    }
}
