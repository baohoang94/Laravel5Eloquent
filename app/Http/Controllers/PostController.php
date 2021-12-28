<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    private $post;
    private $tag;
    public function __construct(Post $post, Tag $tag)
    {
        $this->post = $post;
        $this->tag = $tag;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->post->latest()->get();
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = $this->tag->all();
        return view('post.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            // insert data to posts table
            $post = $this->post->create([
                'name' => $request->name,
                'description' => $request->description,
            ]);
            // insert to comments table
            $post->comments()->create([
                'content' => $request->comment
            ]);
            // insert to post_tag table
            $post->tags()->attach($request->tags);
            DB::commit();
            return redirect()->route('post.index');
        } catch (\Exception $e) {
            Log::error('Message: ' . $e->getMessage() . ' Line: ' . $e->getLine());
            DB::rollBack();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = $this->tag->all();
        $post = $this->post->find($id);
        return view('post.edit', compact('post', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            // insert data to posts table
            $this->post->find($id)->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);
            $post = $this->post->find($id);
            // insert to comments table
            $post->comments()->create([
                'content' => $request->comment
            ]);
            // insert to post_tag table
            $post->tags()->sync($request->tags);
            DB::commit();
            return redirect()->route('post.index');
        } catch (\Exception $e) {
            Log::error('Message: ' . $e->getMessage() . ' Line: ' . $e->getLine());
            DB::rollBack();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->post->find($id)->delete();
        return redirect()->route('post.index');
    }
}
