<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class National extends Model
{
    protected $table = 'nationals';
    protected $fillable = ['name'];

    public function categories(){
        return $this->hasMany(Category::class);
    }
}
