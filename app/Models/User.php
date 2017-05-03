<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
//    use EntrustUserTrait; // add this trait to your user model
//    use SoftDeletes;
    use EntrustUserTrait { restore as private restoreA; }
    use SoftDeletes { restore as private restoreB; }
    /**
     * 解决 EntrustUserTrait 和 SoftDeletes 冲突
     */
    public function restore()
    {
        $this->restoreA();
        $this->restoreB();
    }

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
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * 获取这个作者下的所有文章。
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * 获取这个作者下的所有联系人。
     */
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    /**
     * 获取这个作者下的所有上传对象。
     */
    public function uploads()
    {
        return $this->hasMany(Upload::class);
    }
}
