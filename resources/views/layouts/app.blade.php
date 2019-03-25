<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Styles -->

    @yield('styles')
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    @include('layouts.nav')

    <div id="app">
        <main class="py-4">
            <div class="container">
                <div class="row">
                    @auth
                    <div class="col-lg-4">
                        <ul class="list-group">
                            <li class="list-group-item"> <a href="{{ route('home') }}">Home</a></li>
                            <li class="list-group-item"> <a href="{{ route('categories') }}">Categories</a></li>
                            <li class="list-group-item"> <a href="{{ route('post.create') }}">Create New Post</a></li>
                            <li class="list-group-item"> <a href="{{ route('category.create') }}">Create New Category</a></li>
                            <li class="list-group-item"> <a href="{{ route('posts') }}">All Posts</a></li>
                            <li class="list-group-item"> <a href="{{ route('posts.trashed') }}">All Trahed Posts</a></li>
                            <li class="list-group-item"> <a href="{{ route('tags') }}">Tags</a></li>
                            <li class="list-group-item"> <a href="{{ route('tag.create') }}">Create New Tag</a></li>
                            <li class="list-group-item"> <a href="{{ route('user.profile') }}">My Profile</a></li>
                            @if(Auth::user()->admin)
                                <li class="list-group-item"> <a href="{{ route('users') }}">Users</a></li>
                                <li class="list-group-item"> <a href="{{ route('user.create') }}">New User</a></li>
                            @endif
                        </ul>
                    </div>

                    <div class="col-lg-8">
                        @yield('content')
                    </div>

                    @else

                    <div class="col-lg-12">
                        @yield('content')
                    </div>
                    @endauth
                </div>
            </div>
        </main>
    </div>
    @yield('scripts')
    @include('layouts.footer')
</body>
</html>
