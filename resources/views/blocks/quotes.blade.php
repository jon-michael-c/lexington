<div class="quotes">
    @if (isset($quotes))
        @php($idx = 0)
        @foreach ($quotes as $quote)
            <div class="quote flex flex-col sm:flex-row justify-center sm:justify-start items-center">
                <div class="quote__headshot mb-[-22%] sm:mb-0 w-[160px] h-auto aspect-square  relative z-[5]">
                    <img src="{{ $quote['image']['url'] }}" alt="{{ $quote['image']['alt'] }}">
                </div>
                <div class="quote__content-container flex items-center w-full flex-col sm:flex-row bg-mist-100">
                    <div class="quote__content text-magenta ">
                        <div class="quote_icon ">
                            <p class="text-[100px] block font-Juana">"</p>
                        </div>
                        <div class="quote__text">
                            <div class="quote__heading">
                                <h4 class="text-magenta font-medium">
                                    {!! $quote['text'] !!}
                                </h4>
                            </div>
                            <div class="quote__author">
                                <p><span class="font-bold">- {!! $quote['author'] !!},</span> {!! $quote['role'] !!}</p>
                            </div>
                        </div>

                    </div>
                    <div class="quote__controls">
                        @if (isset($quotes))
                            @for ($i = 0; $i < count($quotes); $i++)
                                <div class="quote__dot @if ($idx == $i) active @endif"></div>
                            @endfor
                        @endif
                    </div>

                </div>
            </div>
            @php($idx++)
        @endforeach
    @endif

</div>
