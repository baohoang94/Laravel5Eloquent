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
}
