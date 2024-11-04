<section class="full-width">
    <div class="inner-full h-fit sm:h-[450px]">
        <div class="video-ctas video-ctas__{{ count($ctas) }}">
            @if ($ctas)
                @foreach ($ctas as $cta)
                    @if (isset($cta['link']['url']) && isset($cta['video']['url']) && isset($cta['title']))
                        <a href="{{ $cta['link']['url'] }}" class="video-ctas__item">
                            <div class="video-ctas__item__overlay"></div>
                            <div class="video-ctas__item__video">
                                <video class="w-full h-full object-cover"
                                    @if (isset($cta['video']['sizes']['large'])) poster="{{ $cta['video']['sizes']['large'] }}" @endif
                                    playsinline muted loop>
                                    <source src="{{ $cta['video']['url'] }}" type="{{ $cta['video']['mime_type'] }}">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                            <h4 class="video-ctas__item__heading">{!! $cta['title'] !!}</h4>
                            <div class="video-ctas__item__arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 44" fill="none">
                                    <path d="M2 2L22 22L2 42" stroke="white" stroke-width="3" />
                                </svg>
                            </div>
                        </a>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</section>
