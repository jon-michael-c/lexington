@php
    $locations = get_the_terms($id, 'location');
    $location = $locations ? $locations[0]->name : '';
    $group = get_the_terms($id, 'group');
    $role = get_field('role', $id);
@endphp

<a class="team-member block text-center mx-auto max-w-[180px] focus-visible:outline-mist-300"
    href="{{ get_the_permalink($id) }}" aria-label="View {{ get_the_title($id) }}'s profile"
    data-title="{{ $role }}" data-location="{{ $location }}" data-group="{{ $group ? $group[0]->name : '' }}"
    data-name="{{ get_the_title($id) }}">

    <div class="w-[90%] mx-auto">
        <x-image src="{{ get_the_post_thumbnail_url($id, 'medium') }}" alt="{{ get_the_title($id) }}"
            class="w-full h-full object-cover" />

    </div>
    <div class="w-full h-[20px] bg-mist mt-[-10px] mb-4"></div>
    <div class="" id="{{ $id }}">
        <div>
            <p class="text-charcoal text-xs  leading-[1.25] font-extrabold">{!! get_the_title($id) !!}
            </p>
        </div>
        <div>
            <p class="text-taupe text-xs">{!! get_field('role', $id) !!}
            </p>
        </div>
        @if ($location)
            <div class="text-taupe ">
                <p class="text-xs">
                    {!! $location !!}
                </p>
            </div>
        @endif
    </div>
</a>
