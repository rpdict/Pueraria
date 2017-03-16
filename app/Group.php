<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function actions()
    {
        return $this->belongsToMany(Action::class);
    }
}
