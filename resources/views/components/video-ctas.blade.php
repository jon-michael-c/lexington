<section class="full-width">
    <div class="inner-full h-fit sm:h-[450px]">
        <div class="video-ctas video-ctas__{{ count($ctas) }}">
            @foreach ($ctas as $cta)
                <a href="{{ $cta['link']['url'] }}" class="video-ctas__item">
                    <div class="video-ctas__item__overlay"></div>
                    <div class="video-ctas__item__video">
                        <video src="{{ $cta['video']['url'] }}" muted loop></video>
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
        </div>
    </div>
</section>
