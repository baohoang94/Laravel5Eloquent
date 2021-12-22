<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content'];
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id1');
        // tham so thu 2: khoa ngoai mac dinh lay theo ten function viet thuong noi voi _id
        // VD: ten function la Post thi khoa ngoai la post_id
        // neu ten function viet hoa ko theo chuan cua no
        // VD: ten function la PostComment thi khoa ngoai la post_comment_id
    }
}
