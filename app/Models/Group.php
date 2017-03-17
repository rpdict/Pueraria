<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Group extends Model
{
    protected $table = 'groups';

    protected $fillable = ['name'];

    public static function createGroup($groupfile)
    {
        $group = new self($groupfile);
        $group->name = Input::get('groupname');;
        $group->save();
        return $group;
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function actions()
    {
        return $this->belongsToMany(Action::class);
    }
}
