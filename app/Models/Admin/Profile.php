<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];
    protected $table = 'profile';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
