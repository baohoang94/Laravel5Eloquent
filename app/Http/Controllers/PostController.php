<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function insert()
    {
        // insert vao bang post

        // insert vao bang comment
        $post = Post::find(1)->comments()->create([
            'content' => 'noi dung comment 1'
        ]);
    }
    public function index()
    {
        DB::connection()->enableQueryLog();
        // lay du lieu theo post_id
        // $posts = Post::find(1)->comments()->where('content', 'noi dung comment 1')->get();
        $posts = Post::find(1)->comments()->first(); // lay 1 ban ghi
        // foreach ($posts as $post) {
        //     echo 'content: ' . $post->content . '<br>';
        // }
        $queries = DB::getQueryLog();
        dd($queries);
    }
    public function insertTags()
    {
        // insert
        $post = Post::find(1);
        $post->tags()->attach([1,2,3]);
    }
    public function updateTags()
    {
        // update
        $post = Post::find(1);

        // cách 1
        $post->tags()->sync([5,4,3]);
        // VD: hiện tại bảng post_tag đang có 3 bản ghi có post_id = 1 và tag_id lần lượt là 1, 2, 3
        // sau khi chạy lệnh trên, các bản ghi có tag_id = 1 và 2 sẽ bị xóa, bản ghi có tag_id = 3 đc giữ nguyên
        // và thêm mới 2 bản ghi có post_id = 1 và tag_id lần lượt là 4 và 5

        // cách 2
        // $post->tags()->detach();
        // $post->tags()->attach([5,4,3]);

        // cách 3: xóa thủ công theo điều kiện sau đó lại thêm thủ công
    }
    public function getTags()
    {
        // get du lieu
        $tags = Post::find(1)->tags;
        // $tags = Post::find(1)->tags()->where('tags.id', 1)->get();
        // $tags = Post::find(1)->tags()->where('tags.id', 1)->first();
        dd($tags);
    }
}
