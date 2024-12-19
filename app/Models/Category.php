<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    const STATUS_SHOW = 1;
    const STATUS_HIDE = 2;

    public function getStatusName()
    {
        $status = [
            self::STATUS_SHOW => 'Show',
            self::STATUS_HIDE => 'Hide',
        ];
        return isset($status[$this->status]) ? $status[$this->status] : 'Unknown';
    }

    public function hideCategory()
    {
        $this->status = self::STATUS_HIDE;
        $this->save();
    }

    public function showCategory()
    {
        $this->status = self::STATUS_SHOW;
        $this->save();
    }

    public function isShow()
    {
        return $this->status == self::STATUS_SHOW;
    }
}
