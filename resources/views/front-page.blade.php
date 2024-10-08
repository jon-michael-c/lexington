@extends('layouts.app')

@section('content')
    @while (have_posts())
        @php(the_post())
        @include('sections.home.hero')
        @includeFirst(['partials.content-page', 'partials.content'])
        <section class="full-width py-8 sm:py-24">
            <div class="grid sm:grid-cols-12 gap-6">
                <div class="col-span-3">
                    <h3 class="text-ocean">Secondary and Co-Investment Market Leader</h3>
                    <a href="#" class="text-ocean uppercase link">About Us</a>
                </div>
                <div class="md:col-span-1"></div>
                <div class="col-span-8">
                    <div class="">
                        <img src="/app/uploads/2024/10/market-leader-e1728336941612.webp" alt="">
                    </div>
                </div>
            </div>
        </section>
        @include('sections.home.stats')
        @include('sections.home.news')
        @include('sections.home.ctas')
    @endwhile
@endsection
