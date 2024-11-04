@extends('layouts.app')
@section('content')
    <article class="full-width relative overflow-hidden min-h-[800px]">
        <div class="container text-center m-auto">
            <h1 class="text-magenta sm:text-[60px]">404</h1>
            <p class="text-charcoal font-medium">Sorry, the page you are looking for could not be found.</p>
            <a href="{{ url('/') }}" class="wp-element-button">Go to Homepage</a>
        </div>
    </article>
@endsection
