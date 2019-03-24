@extends('layouts.app')

@section('content')

@include('inc.errors')

<div class="card">
    <div class="card-title">
        <h2 class="text-center mt-2">Edit Post: {{ $post->title }} </h2>
    </div>

    <div class="card-body">
        <form action="{{ route('post.update', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }} <!-- upisuje se kako bi laravel znao da se submit iz aplikacije, a ne sa treće strane -->
            
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="title.." value="{{ $post->title }}">
            </div>

            <div class="form-group">
                <label for="featured">Featured</label>
                <input type="file" name="featured" id="featured" class="form-control">
            </div>

            <div class="form-group">
                <label for="category">Select a category</label>

                <select name="category_id" id="category" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            
                            @if ($post->category->id == $category->id)
                                selected
                            @endif
                        
                        > {{$category->name}} </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tags">Select Tags</label>
                @foreach ($tags as $tag)
                    <div class="checkbox">
                        <label><input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                        
                            @foreach ($post->tags as $t)
                                @if($tag->id == $t->id)
                                    checked
                                @endif
                            @endforeach
                            
                        > {{ $tag->tag }}</label>
                    </div>
                @endforeach
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" cols="5" rows="5" class="form-control"> {{ $post->content }} </textarea>
            </div>

            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Update Post</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection