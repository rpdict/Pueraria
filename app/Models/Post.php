<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'posts';

    protected $fillable = ['title', 'content'];

    public static function createPost($user, $postfile)
    {
        $post = new self($postfile);
        $post->author_id = $user->id;
        $post->save();
        return $post;
    }

    public function author() {
        return $this->belongsTo(User::class);
    }
}
