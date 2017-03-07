<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    /**
     * 获取该组下的所有用户。
     */
    public function users()
    {
        return $this->belongsToMany(Group::class);
    }

}
