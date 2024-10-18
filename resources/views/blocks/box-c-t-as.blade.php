    @if (isset($items))
        <div class="grid gap-4 md:grid-cols-{{ count($items) }} sm:gap-8 mb-4">
            @php($i = 1)
            @foreach ($items as $item)
                <a href="{{ $item['link']['url'] }}" target="{{ $item['link']['target'] }}"
                    class="relative p-10 text-center flex justify-center items-center bg-taupe">
                    <div class="absolute top-0 left-0 w-full h-full opacity-25 z-[0] mix-blend-multiply">
                        @if (isset($item['image']['sizes']['medium']))
                            <img src="{{ $item['image']['sizes']['medium'] }}" alt="background image"
                                class="w-full h-full object-cover">
                        @endif
                    </div>
                    <h4 class="text-white relative z-1 ">
                        {!! $item['link']['title'] !!}
                    </h4>
                </a>
                @php($i++)
            @endforeach
        </div>
    @endif
