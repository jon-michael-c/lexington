@php
    $pins = get_posts([
        'post_type' => 'office',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'fields' => 'ids',
    ]);

    $pins = array_map(function ($pin) {
        return get_the_title($pin);
    }, $pins);
@endphp

<div class="locations-map overflow-hidden" id="#map">
    @include('components.map')
    <div class="pins">
        @foreach ($pins as $pin)
            <div class="pin" id="{{ Str::slug($pin) }}">
                <div class="pin-title-container">
                    <div class="pin-title">
                        <span class="nowrap">{{ $pin }}</span>
                    </div>
                </div>
                <svg width="14" height="20" viewBox="0 0 14 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path id="Mask" fill-rule="evenodd" clip-rule="evenodd"
                        d="M7 0C3.13 0 0 3.13 0 7C0 12.25 7 20 7 20C7 20 14 12.25 14 7C14 3.13 10.87 0 7 0ZM7 9.5C5.62 9.5 4.5 8.38 4.5 7C4.5 5.62 5.62 4.5 7 4.5C8.38 4.5 9.5 5.62 9.5 7C9.5 8.38 8.38 9.5 7 9.5Z"
                        fill="#C7D9D4" />
                </svg>
            </div>
        @endforeach
    </div>
</div>
