<section class="hero full-width">
    <div class="site-logo">
        <img src="{{ $siteLogo }}" alt="Logo">
    </div>
    @php($i = 1)
    @foreach ($intro_videos as $video)
        <div class="intro__video intro__video-{{ $i }}">
            <video autoplay muted loop playsinline>
                <source src="{{ $video['video']['url'] }}" type="{{ $video['video']['mime_type'] }}">
            </video>
        </div>
        @php($i++)
    @endforeach

    <div class="hero__green-1"></div>
    <div class="hero__green-2"></div>
    <div class="hero__champion breakout">
        <div class="hero__video">
            <video autoplay muted loop playsinline>
                <source src="{{ $main_video['url'] }}" type="{{ $main_video['mime_type'] }}">
            </video>
            <div class="overlay overlay-1"></div>
            <div class="overlay overlay-2"></div>
        </div>
        <div class="hero__tagline">
            <div class="hero__line"></div>
            <div class="hero__heading">
                <h1 class="hero__heading-h1">{!! get_field('page_excerpt', get_the_ID()) !!}</h1>
            </div>
        </div>
        <div class="hero__stripe">
            <div class="stripe"></div>
        </div>
    </div>

    <div class="hero__text breakout">
        <div class="hero__text-bg"></div>
        <div class="hero__text-content">
            <div class="hero__text-content-inner">
                <p>
                    Lexington Partners is one of the world’s largest and most trusted managers of secondary private
                    equity
                    and co-investment funds.
                </p>
            </div>
            <div class="hero__text-content-cta">
                <a href="{{ home_url('investment-strategies') }}">
                    <p>Our Investment Strategies</p>
                    <div class="arr">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="22" viewBox="0 0 14 22"
                            fill="none">
                            <path d="M1 1L13.1212 11L1 21" stroke="white" />
                        </svg>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
