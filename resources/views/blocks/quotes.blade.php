<div class="quotes">
    @if (isset($quotes))
        @foreach ($quotes as $quote)
            <div class="quote flex flex-col sm:flex-row justify-center sm:justify-start items-center">
                <div class="quote__headshot w-[160px] h-auto aspect-square  relative z-[5]">
                    <img src="{{ $quote['image']['url'] }}" alt="{{ $quote['image']['alt'] }}">
                </div>
                <div class="quote__content text-magenta bg-mist-100">
                    <div class="quote_icon ">
                        <p class="text-[100px] block font-Juana">"</p>
                    </div>
                    <div class="quote__text max-w-[700px]">
                        <div class="quote__heading">
                            <h4 class="text-magenta font-medium">
                                {!! $quote['text'] !!}
                            </h4>
                        </div>
                        <div class="quote__author">
                            <p><span class="font-bold">- {!! $quote['author'] !!},</span> {!! $quote['role'] !!}</p>
                        </div>
                    </div>
                    <div class="quote__controls w-[10%]">

                    </div>
                </div>
            </div>
        @endforeach
    @endif
    <div class="quote__controls">
        @if (isset($quotes))
            @for ($i = 0; $i < count($quotes); $i++)
                <div class="quote__dot"></div>
            @endfor
        @endif
    </div>
</div>
