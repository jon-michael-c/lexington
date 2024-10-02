@extends('layouts.app')

@section('content')
    @while (have_posts())
        @php(the_post())
        @include('sections.home.hero')
        @includeFirst(['partials.content-page', 'partials.content'])
    @endwhile
@endsection
