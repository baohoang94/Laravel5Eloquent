@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Trang create post</h2>
        </div>
        <div class="col-md-8">
            <form method="post" action="{{ route('post.store') }}">
                @csrf
                <div class="form-group">
                  <label>Name</label>
                  <input name="name" class="form-control" placeholder="Enter name">
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" name="description" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label>Comment</label>
                  <textarea class="form-control" name="comment" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Tags</label>
                    <select name="tags[]" multiple class="form-control" id="exampleFormControlSelect2">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
</div>
@endsection
