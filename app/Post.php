<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id1');
        // tham so thu 2: khoa ngoai mac dinh lay theo ten model viet thuong noi voi _id
        // VD: ten model la Post thi khoa ngoai la post_id
    }
}
