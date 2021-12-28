@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Trang list post</h2>
        <div class="col-md-12">
            <h3>
                <a class="btn btn-primary" href="{{ route('post.create') }}" role="button">Create</a>
            </h3>
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($posts as $postItem)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $postItem->name }}</td>
                        <td>{{ $postItem->description }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('post.edit', ['id' => $postItem->id]) }}" role="button">Edit</a>
                            <a class="btn btn-danger" href="{{ route('post.destroy', ['id' => $postItem->id]) }}" role="button">Delete</a>
                            <a class="btn btn-info" href="#" role="button">Show</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection
