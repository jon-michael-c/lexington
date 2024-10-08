@php
    $ctas = [
        [
            'title' => 'Our <br> Team',
            'link' => '#',
            'vid' => 'https://lexington.local/app/uploads/2024/10/our-team.mp4',
        ],
        [
            'title' => 'Our <br> Milestones',
            'link' => '#',
            'vid' => 'https://lexington.local/app/uploads/2024/10/our-milestones.mp4',
        ],
        [
            'title' => 'Our Contacts <br> & Locations',
            'link' => '#',
            'vid' => 'https://lexington.local/app/uploads/2024/10/our-contacts.mp4',
        ],
    ];
@endphp
<section class="full-width">
    <div class="inner-full h-[450px]">
        <div class="video-ctas">
            @if ($ctas)
                @foreach ($ctas as $cta)
                    <a href="{{ $cta['link'] }}" class="video-ctas__item">
                        <div class="video-ctas__item__overlay"></div>
                        <div class="video-ctas__item__video">
                            <video src="{{ $cta['vid'] }}" muted loop></video>
                        </div>
                        <h4 class="video-ctas__item__heading">{!! $cta['title'] !!}</h4>
                        <div class="video-ctas__item__arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="44" viewBox="0 0 25 44"
                                fill="none">
                                <path d="M2 2L22 22L2 42" stroke="white" stroke-width="3" />
                            </svg>
                        </div>
                    </a>
                @endforeach
            @endif
        </div>
    </div>
</section>
