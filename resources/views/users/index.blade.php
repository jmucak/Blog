@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <th>Image</th>
                <th>Name</th>
                <th>Permissions</th>
                <th>Delete</th>
            </thead>
            <tbody>
                @if($users->count() > 0)
                    @foreach ($users as $user)
                        <tr>
                            <td> <img src="{{ asset($user->profile->avatar) }}" alt="{{ $user->name }}" width="50px" height="40px" style="border-radius: 50%;"> </td>
                            <td>{{ $user->name }} </td>
                            <td>Permissions</td>
                            <td>Delete</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th colspan="5" class="text-center">No published posts</th>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection