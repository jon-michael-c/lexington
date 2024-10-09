<article class="full-width relative pt-8 sm:pt-24 sm:pb-24 bg-mist-300">
    <div class="relative">
        <div class="hidden sm:block absolute top-0 right-0 w-[85%] h-full bg-white z-[0]">
        </div>
        <div class="mb-12 hidden sm:block">
            <a href="{{ home_url('team') }}" class="text-ocean uppercase link">Back to Team</a>
        </div>
        <div class="flex flex-col sm:flex-row sm:gap-8 justify-between items-start relative z-[5]">
            <div class="max-w-[170px] sm:max-w-[360px] pb-12">
                <img src="{!! get_the_post_thumbnail_url() !!}" alt="{!! get_the_title() !!}" class="w-full h-auto">
            </div>
            <div class="mx-auto sm:max-w-[550px] -mt-28 pt-28 pb-8 sm:mt-0 sm:py-0 sm:pb-16 relative">
                <div class="block sm:hidden absolute left-[-24px] top-0 bg-white w-[100vw] z-[-1] h-full ">
                </div>
                <header class="pb-4 sm:pb-8">
                    <div>
                        <p class="font-Eina text-magenta uppercase">
                            Team
                        </p>
                    </div>
                    <div>
                        <h1 class="text-ocean font-medium sm:text-3xl">
                            {!! get_the_title() !!}
                        </h1>
                    </div>
                    <div class="mt-4">
                        @php
                            $locations = get_the_terms(get_the_ID(), 'location');
                            $location = $locations ? $locations[0]->name : '';
                        @endphp
                        <p class="text-taupe font-bold">{!! get_field('role', get_the_ID()) !!} @if ($location)
                                | {!! $location !!}
                            @endif
                        </p>
                    </div>
                </header>
                <div class="e-content grid gap-4 text-charcoal w-ful">
                    @php(the_content())
                </div>
                <div class="mb-12 mt-8 sm:hidden">
                    <a href="{{ home_url('team') }}" class="text-ocean uppercase link">Back to Team</a>
                </div>
            </div>
        </div>
    </div>

</article>
