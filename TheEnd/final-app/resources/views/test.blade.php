<!-- - Use the main layout file as the base template -->
@extends('layouts.app')

<!--  - Define the content that goes into the layout's  -->
@yield('content')
@section('content')
    <div class="container text-center py-5">
        <h1 class="mb-4">Welcome to the Final App</h1>
        <p class="lead">Laravel + Bootstrap simple app to manage articles.</p>

        <!-- Test buttons to verify layout -->
        <div class="mt-4">
            <a href="" class="btn btn-primary me-2">View Articles</a>
            @auth
                <a href="" class="btn btn-success">Create Article</a>
            @else
                <a href="" class="btn btn-outline-primary">Login</a>
            @endauth
        </div>
    </div>
@endsection
