@php
    // Get the 3 most recent news articles
    $news = get_posts([
        'post_type' => 'post',
        'posts_per_page' => 3,
        'orderby' => 'date',
        'fields' => 'ids',
    ]);
@endphp

<section class="full-width py-24">
    <div class="flex justify-between items-center w-full mb-4">
        <h3>News and Press</h3>
        <a href="{{ get_post_type_archive_link('post') }}" class="text-ocean uppercase link">See More</a>
    </div>
    <div class="news grid sm:grid-cols-3 bg-mist-100 py-4 px-6">
        @if ($news)
            @foreach ($news as $id)
                @include('partials.posts.preview', ['id' => $id])
            @endforeach
        @endif
    </div>
</section>
