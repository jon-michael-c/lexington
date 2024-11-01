@php
    $page_id = get_page_by_title('News and Press')->ID;
    $image = get_the_post_thumbnail_url($page_id);
    $header_text = 'News and Press';
    $paged = get_query_var('paged') ?: 1;
    $type = request()->query('type', ['post', 'news', 'press-releases']);
    if ($type == 'all') {
        $type = ['post', 'news', 'press-releases'];
    }

    $query = new WP_Query([
        'post_type' => $type,
        'posts_per_page' => 9,
        'orderby' => 'date',
        'fields' => 'ids',
        'paged' => $paged,
    ]);
    $total_pages = $query->max_num_pages;

    $options = [
        [
            'value' => 'all',
            'label' => 'All',
        ],
        [
            'value' => 'news',
            'label' => 'News',
        ],
        [
            'value' => 'press-releases',
            'label' => 'Press Releases',
        ],
    ];
@endphp
<section class="py-8 sm:py-24">
    <div class="w-full grid gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 sm:gap-8 pb-12">
        <div class="type-select">
            <x-select :options="$options" :current="$type" />
        </div>
    </div>
    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6 posts-container">
        @while ($query->have_posts())
            @php $query->the_post() @endphp
            <div class="post-item">
                @include('partials.posts.preview', ['id' => get_the_ID()])
            </div>
        @endwhile
    </div>

    {{-- Pagination with arrows and limited numbers --}}
    <div class="pagination flex justify-center items-center gap-8 mt-8">
        @php
            echo paginate_links([
                'total' => $total_pages,
                'current' => $paged,
                'end_size' => 1,
                'mid_size' => 1,
                'prev_text' =>
                    '<span class="arrow-left"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="17" viewBox="0 0 12 17" fill="none"><path d="M11 1L2 8.5L11 16" stroke="#C7D9D4" stroke-width="2"/></svg></span>',
                'next_text' =>
                    '<span class="arrow-right"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="17" viewBox="0 0 12 17" fill="none"><path d="M1 16L10 8.5L1 1" stroke="#C7D9D4" stroke-width="2"/></svg></span>',
            ]);
        @endphp
    </div>
</section>
@php(wp_reset_postdata())


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const select = document.querySelector('.type-select select');
        const postsContainer = document.querySelector('.posts-container');

        select.addEventListener('change', function() {
            const type = select.value;
            const url = new URL(window.location.href + '/page/1');
            url.searchParams.set('type', type);
            window.location.href = url;
        });
    });
</script>
