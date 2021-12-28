<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = [];
    // 1-n
    public function comments()
    {
        return $this->hasMany(Comment::class);
        // tham so thu 2: khoa ngoai mac dinh lay theo ten model viet thuong noi voi _id
        // VD: ten model la Post thi khoa ngoai la post_id
    }
    // n-n
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
