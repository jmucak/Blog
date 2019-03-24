@extends('layouts.app')

@section('content')

@include('inc.errors')

<div class="card">
    <div class="card-title">
        <h2 class="text-center mt-2">Edit Your Profile</h2>
    </div>

    <div class="card-body">
        <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
            </div>

            <div class="form-group">
                <label for="email">User Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
            </div>

            <div class="form-group">
                <label for="password">New password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="password..">
            </div>

            <div class="form-group">
                <label for="avatar">Avatar</label>
                <input type="file" name="avatar" id="avatar" class="form-control">
            </div>

            <div class="form-group">
                <label for="facebook">Facebook profile</label>
                <input type="text" name="facebook" id="facebook" class="form-control" value="{{ $user->profile->facebook }}">
            </div>

            <div class="form-group">
                <label for="youtube">Youtube profile</label>
                <input type="text" name="youtube" id="youtube" class="form-control" value="{{ $user->profile->youtube }}">
            </div>

            <div class="form-group">
                <label for="about">About me</label>
                <textarea name="about" id="about" cols="5" rows="5" class="form-control">{{ $user->profile->about }} </textarea>
            </div>

            <div class="form-group">
                <button class="btn btn-success" type="submit">Update Profile</button>
            </div>
        </form>
    </div>
</div>

@endsection