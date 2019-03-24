@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Edit</th>
                <th>Trash</th>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td><img src="{{ $post->featured }}" alt="{{ $post->title }}" witdh="100px" height="50px"></td>
                        <td>{{ $post->title }}</td>
                        <td><a href="{{ route('post.edit', ['id' => $post->id] ) }}" class="btn btn-warning">Edit</a></td>
                        <td><a href="{{ route('post.delete', ['id' => $post->id] ) }}" class="btn btn-danger">Trash</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection