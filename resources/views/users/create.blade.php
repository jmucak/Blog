@extends('layouts.app')

@section('content')

@include('inc.errors')

<div class="card">
    <div class="card-title">
        <h2 class="text-center mt-2">Create New User</h2>
    </div>

    <div class="card-body">
        <form action="{{ route('user.store') }}" method="POST">
            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="name">User Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="name..">
            </div>

            <div class="form-group">
                <label for="email">User Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="email..">
            </div>

            <div class="form-group">
                <button class="btn btn-success" type="submit">Add User</button>
            </div>
        </form>
    </div>
</div>

@endsection