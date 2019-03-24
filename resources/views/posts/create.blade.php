@extends('layouts.app')

@section('content')

@include('inc.errors')

<div class="card">
    <div class="card-title">
        <h2 class="text-center mt-2">Create New Post</h2>
    </div>

    <div class="card-body">
        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }} <!-- upisuje se kako bi laravel znao da se submit iz aplikacije, a ne sa treće strane -->
            
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="title..">
            </div>

            <div class="form-group">
                <label for="featured">Featured</label>
                <input type="file" name="featured" id="featured" class="form-control">
            </div>

            <div class="form-group">
                <label for="category">Select a category</label>

                <select name="category_id" id="category" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"> {{$category->name}} </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tags">Select Tags</label>
                @foreach ($tags as $tag)
                    <div class="checkbox">
                        <label><input type="checkbox" name="tags[]" value="{{ $tag->id }}"> {{ $tag->tag }}</label>
                    </div>
                @endforeach
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Store Post</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection