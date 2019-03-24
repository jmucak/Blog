@extends('layouts.app')

@section('content')

@include('inc.errors')

<div class="card">
    <div class="card-title">
        <h2 class="text-center mt-2">Create New Tag</h2>
    </div>

    <div class="card-body">
        <form action="{{ route('tag.store') }}" method="POST">
            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="tag">Tag</label>
                <input type="text" name="tag" id="tag" class="form-control" placeholder="tag..">
            </div>

            <div class="form-group">
                <button class="btn btn-success" type="submit">Store Tag</button>
            </div>
        </form>
    </div>
</div>

@endsection