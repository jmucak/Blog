@extends('layouts.app')

@section('content')

@include('inc.errors')

<div class="card">
    <div class="card-title">
        <h2 class="text-center mt-2">CEdit Tag {{ $tag->tag }} </h2>
    </div>

    <div class="card-body">
        <form action="{{ route('tag.update', ['id' => $tag->id]) }}" method="POST">
            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="tag">Tag</label>
                <input type="text" name="tag" id="tag" class="form-control" placeholder="tag.." value="{{ $tag->tag }}">
            </div>

            <div class="form-group">
                <button class="btn btn-success" type="submit">Update Tag</button>
            </div>
        </form>
    </div>
</div>

@endsection