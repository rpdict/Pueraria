<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * 获取该组下的所有用户。
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
