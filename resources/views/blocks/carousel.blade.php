@php
    $offices = get_posts([
        'post_type' => 'office',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'fields' => 'ids',
    ]);
    $id = $offices[0];
@endphp

<div class="office-carousel">
    <div class="office-image-container ">
        @if ($offices)
            @php($i = 0)
            @foreach ($offices as $id)
                <div class="office-image @if ($i == 0) active @endif">
                    <img src="{{ get_the_post_thumbnail_url($id, 'full') }}" alt="{{ get_the_title($id) }}"
                        class="w-full h-full aspect-square object-contain">
                </div>
                @php($i++)
            @endforeach
        @endif
    </div>
    <div class="office-box">
        <div class="office-box-bg"></div>
        <div class="office-btn office-prev">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="32" viewBox="0 0 18 32" fill="none">
                <path d="M17 1L2 16L17 31" stroke="#002E45" stroke-width="2" />
            </svg>
        </div>
        <div class="office-title-container">
            @if ($offices)
                @php($i = 0)
                @foreach ($offices as $id)
                    <div class="office-title @if ($i == 0) active @endif">
                        <p class="text-ocean font-bold">{{ get_the_title($id) }}</p>
                    </div>
                    @php($i++)
                @endforeach
            @endif
        </div>
        <div class="office-btn office-next">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="32" viewBox="0 0 18 32" fill="none">
                <path d="M1 1L16 16L1 31" stroke="#002E45" stroke-width="2" />
            </svg>
        </div>
    </div>
    <div class="office-dots">
        @if ($offices)
            @for ($i = 0; $i < count($offices); $i++)
                <div class="office-dot @if ($i == 0) active @endif"> </div>
            @endfor
        @endif
    </div>
</div>
