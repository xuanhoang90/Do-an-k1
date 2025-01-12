<?php

<<<<<<< HEAD:app/Models/National.php
namespace App\Models;
=======
namespace App\Models\Admin;
>>>>>>> 01ce354e1fc89bb1b36d0b823ec8f438cb25201b:app/Models/Admin/National.php

use Illuminate\Database\Eloquent\Model;

class National extends Model
{
    protected $table = 'nationals';
<<<<<<< HEAD:app/Models/National.php
=======
    protected $fillable = ['name'];

    public function categories(){
        return $this->hasMany(Category::class);
    }
>>>>>>> 01ce354e1fc89bb1b36d0b823ec8f438cb25201b:app/Models/Admin/National.php
}
