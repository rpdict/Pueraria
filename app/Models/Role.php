<?php

namespace App\Models;

use Zizaco\Entrust\EntrustRole;
use Illuminate\Support\Facades\Input;

class Role extends EntrustRole
{
//    public static function createRole($rolefile)
//    {
//        $role = new self($rolefile);
//        $role->name = Input::get('rolename');;
//        $role->save();
//        return $role;
//    }
}