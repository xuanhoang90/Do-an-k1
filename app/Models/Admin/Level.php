<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $guarded = [];
    protected $table = 'levels';

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
