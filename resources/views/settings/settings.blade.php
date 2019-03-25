@extends('layouts.app')

@section('content')

@include('inc.errors')

<div class="card">
    <div class="card-title">
        <h2 class="text-center mt-2">Edit Blog Settings</h2>
    </div>

    <div class="card-body">
        <form action="{{ route('settings.update') }}" method="POST">
            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="site_name">Site Name</label>
                <input type="text" name="site_name" id="site_name" value="{{ $settings->site_name }}" class="form-control" placeholder="site_name..">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" value="{{ $settings->address }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="contact_number">Contact Number</label>
                <input type="text" name="contact_number" id="contact_number" value="{{ $settings->contact_number }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="contact_email">Contact Email</label>
                <input type="email" name="contact_email" id="contact_email" value="{{ $settings->contact_email }}" class="form-control">
            </div>

            <div class="form-group">
                <button class="btn btn-success" type="submit">Update site settings</button>
            </div>
        </form>
    </div>
</div>

@endsection