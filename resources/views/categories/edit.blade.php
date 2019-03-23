@extends('layouts.app')

@section('content')

@include('inc.errors')

<div class="card">
    <div class="card-title">
        <h2 class="text-center mt-2">Update Category: {{ $category->name }} </h2>
    </div>

    <div class="card-body">
        <form action="{{ route('category.update', ['id' => $category->id]) }}" method="POST">
            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ $category->name }} " class="form-control" placeholder="name..">
            </div>

            <div class="form-group">
                <button class="btn btn-success" type="submit">Update Category</button>
            </div>
        </form>
    </div>
</div>

@endsection