<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostsPosts extends Model
{
    protected $table = 'posts_posts';

    public function img()
    {
        return $this->hasOne('App\Post', 'id', 'post_id2');
    }
}
