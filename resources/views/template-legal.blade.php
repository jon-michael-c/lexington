@extends('layouts.app')

@section('content')
    @while (have_posts())
        @php(the_post())

        <article class="py-8 sm:py-24">
            @include('sections.page-header-legal')
            @php(the_content())
        </article>
    @endwhile
@endsection
