<?php

namespace App\Models\Admin;
use App\Models\Admin\National;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'description', 'thumbnail', 'status','national_id'];

    public function lessons(){
        return $this->hasMany(Lesson::class);
    }

    public function national() {
        return $this->belongsTo(National::class);
    }
}
