<a class="block text-center mx-auto max-w-[180px]" href="{{ get_the_permalink($id) }}">
    <div class="w-[90%] mx-auto">
        <img src="{{ get_the_post_thumbnail_url($id, 'medium') }}" alt="{{ get_the_title($id) }}"
            class="w-full h-full object-cover">
    </div>
    <div class="w-full h-[20px] bg-mist mt-[-10px] mb-4"></div>
    <div>
        <p class="text-charcoal font-extrabold">{!! get_the_title($id) !!}</p>
    </div>
    <div>
        @php
            $locations = get_the_terms($id, 'location');
            $location = $locations ? $locations[0]->name : '';
        @endphp
        <p class="text-taupe">{!! get_field('role', $id) !!} @if ($location)
                | {!! $location !!}
            @endif
        </p>

    </div>

</a>
