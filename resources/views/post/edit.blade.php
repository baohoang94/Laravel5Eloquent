@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Trang edit post</h2>
        </div>
        <div class="col-md-8">
            <form method="post" action="{{ route('post.update', ['id' => $post->id]) }}">
                @csrf
                <div class="form-group">
                  <label>Name</label>
                  <input name="name" value="{{ $post->name }}" class="form-control" placeholder="Enter name">
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" name="description" rows="3">{{ $post->description }}</textarea>
                </div>
                <div class="form-group">
                  <label>Comment</label>
                  @php
                      $comments = $post->comments;
                  @endphp
                  {{-- @if ($commets->isEmpty()) --}}
                      @foreach ($comments as $comment)
                        <p style="color: red">
                            {{ $comment->content }}
                        </p>
                    @endforeach
                  {{-- @endif --}}
                  
                  <textarea class="form-control" name="comment" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Tags</label>
                    @php
                        $tagsSelected = $post->tags()->pluck('tags.id');
                    @endphp
                    <select name="tags[]" multiple class="form-control" id="exampleFormControlSelect2">
                        @foreach ($tags as $tag)
                            <option {{ $tagsSelected->contains($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
</div>
@endsection
