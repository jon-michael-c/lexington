@php
    $offices = get_posts([
        'post_type' => 'office',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'fields' => 'ids',
    ]);
@endphp
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-y-8 gap-x-8 sm:gap-y-24 sm:gap-x-0 py-8 text-mist">
    @foreach ($offices as $office)
        @php
            $name = get_field('name', $office);
            $address = get_field('address', $office);
            // Get map link from address, also get rid of html tags
            $map = 'https://www.google.com/maps/search/?api=1&query=' . urlencode(strip_tags($address));
            $phone = get_field('phone', $office);
            // Convert text to tel link, ex +1 (212) 754-0411 -> +12127540411
            $tel = preg_replace('/[^0-9]/', '', $phone);
        @endphp
        <div class="office sm:h-[230px] pl-8 relative" data-office="{{ Str::slug(get_the_title($office)) }}">

            <div class="absolute top-0 left-0 bg-mist w-[2px] h-full"></div>
            <div class="grid gap-3 w-full">
                <h3>{!! get_the_title($office) !!}</h3>
                @if ($name)
                    <p class="font-semibold">{!! $name !!}</p>
                @endif
                <a href="{{ $map }}" target="_blank" class="flex items-start gap-2">
                    <span class="w-[24px] h-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="20" viewBox="0 0 14 20"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7 0C3.13 0 0 3.13 0 7C0 12.25 7 20 7 20C7 20 14 12.25 14 7C14 3.13 10.87 0 7 0ZM7 9.5C5.62 9.5 4.5 8.38 4.5 7C4.5 5.62 5.62 4.5 7 4.5C8.38 4.5 9.5 5.62 9.5 7C9.5 8.38 8.38 9.5 7 9.5Z"
                                fill="#C7D9D4" />
                        </svg>
                    </span>
                    <span>
                        {!! $address !!}
                    </span>
                </a>
                <a href="tel:{{ $tel }}" class="flex items-start gap-2">
                    <span class="w-[24px] h-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M3.62 7.79C5.06 10.62 7.38 12.93 10.21 14.38L12.41 12.18C12.68 11.91 13.08 11.82 13.43 11.94C14.55 12.31 15.76 12.51 17 12.51C17.55 12.51 18 12.96 18 13.51V17C18 17.55 17.55 18 17 18C7.61 18 0 10.39 0 1C0 0.45 0.45 0 1 0H4.5C5.05 0 5.5 0.45 5.5 1C5.5 2.25 5.7 3.45 6.07 4.57C6.18 4.92 6.1 5.31 5.82 5.59L3.62 7.79Z"
                                fill="#C7D9D4" />
                        </svg>
                    </span>
                    <span>
                        {!! $phone !!}
                    </span>
                </a>
            </div>
        </div>
    @endforeach
</div>
