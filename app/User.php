<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 获取该用户所属的组。
     */
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    /**
     * 获取这个作者下的所有文章。
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
