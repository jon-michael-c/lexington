<section class="reasons full-width relative my-8 sm:my-16 py-6 sm:py-16">
    <div class="reasons-bg bg-mist absolute top-0 left-0 w-full h-full z-[-2]"></div>
    <div class="reasons-content">
        <div class="max-w-[850px]">
            <InnerBlocks />
        </div>
    </div>
    <div class="reasons-breakout my-32 relative">
        <div class="reasons-image absolute top-[50%] left-0 h-[110%] w-1/2 z-[-1] translate-y-[-50%]">
            @if (isset($image))
                <img src="{{ $image['url'] }}" alt="background image" class="w-full h-full object-cover">
            @endif
        </div>
        <div
            class="reasons-items h-[900px] flex flex-col justify-center items-center bg-mist-100 relative z-[2] ml-auto w-[60%] py-16">
            @if (isset($items))
                @foreach ($items as $item)
                    <div class="reasons-item">
                        <div class="reasons-icon">

                        </div>
                        <div>
                            <div class="reasons-title">
                                <p class="text-magenta font-bold">{!! $item['title'] !!}</p>
                            </div>
                            <div class="reasons-text text-charcoal">
                                {!! $item['content'] !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
