<article class="full-width relative overflow-hidden">
    <div class="py-8 sm:py-16 max-w-[800px] relative">
        <div class="inner-full absolute top-0 right-[-96px] w-[150vw] h-full bg-mist-100 z-[-1]"></div>
        <header class="pb-4 sm:pb-8">
            <div class="max-w-[800px]">

                <a href="{{ home_url('news-and-press') }}" class="text-charcoal block uppercase mb-4"
                    onclick="if (window.history.length > 1) { window.history.back(); return false; } else { window.location.href='{{ home_url('news-and-press') }}'; }">Back
                    to
                    News & Press</a>
                <h1 class="text-ocean text-2xl sm:text-3xl">
                    {!! $title !!}
                </h1>
            </div>
            <hr class="border-t-2 border-mist w-full my-6 ">
            <div>
                <p class="text-ocean">
                    @if (get_field('publication'))
                        <span class="font-bold">{!! get_field('publication') !!}</span><br>
                    @endif
                    <span class="text-xs">{!! get_the_date('d M Y') !!}</span>
                </p>
            </div>
        </header>
        <div class="e-content grid gap-6">
            @php(the_content())
            @if (get_field('external_link'))
                <a href="{{ get_field('external_link') }}" target="_blank"
                    class="block text-charcoal uppercase link w-fit">Read
                    More</a>
            @endif
        </div>
        <div class="my-16 sm:my-36">
            <a href="{{ home_url('news-and-press') }}"
                onclick="if (window.history.length > 1) { window.history.back(); return false; } else { window.location.href='{{ home_url('news-and-press') }}'; }"
                class="text-ocean uppercase link">Back to News &
                Press</a>
        </div>
    </div>

</article>
