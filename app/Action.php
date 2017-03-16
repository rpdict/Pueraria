<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $table = 'actions';

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
}
