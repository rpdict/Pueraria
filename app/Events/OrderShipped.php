<?php

namespace App\Events;

use App\User;
use Illuminate\Queue\SerializesModels;

class OrderShipped
{
    use SerializesModels;

    public $user;

    /**
     * 创建一个事件实例。
     *
     * @param  User  $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->order = $user;
    }
}