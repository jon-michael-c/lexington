<article class="full-width relative overflow-hidden">
    <div class="py-8 sm:py-16 max-w-[800px] relative">
        <div class="inner-full absolute top-0 right-[-96px] w-[150vw] h-full bg-mist-100 z-[-1]"></div>
        <header class="pb-4 sm:pb-8">
            <div class="max-w-[800px]">
                <a href="{{ get_post_type_archive_link('post') }}" class="text-charcoal block uppercase mb-4">News and
                    Press</a>
                <h1 class="text-ocean text-2xl sm:text-3xl">
                    {!! $title !!}
                </h1>
            </div>
            <hr class="border-t-2 border-mist w-full my-6 ">
            <div>
                <p class="text-ocean"><span class="font-bold">{!! get_the_author() !!}</span><br>
                    <span class="text-xs">{!! get_the_date('d M Y') !!}</span>
                </p>
            </div>
        </header>

        <div class="e-content grid gap-6">
            @php(the_content())
        </div>
        <div class="my-16 sm:my-36">
            <a href="{{ get_post_type_archive_link('post') }}" class="text-ocean uppercase link">Back to News &
                Press</a>
        </div>
    </div>

</article>
