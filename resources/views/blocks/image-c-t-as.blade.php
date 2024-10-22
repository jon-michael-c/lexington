@if (isset($items))
    <div class="grid gap-4 md:grid-cols-{{ count($items) }} sm:gap-8 mt-6 mb-12">
        @php($i = 1)
        @foreach ($items as $item)
            <a href="{{ $item['link']['url'] }}" target="{{ $item['link']['target'] }}"
                class="img-cta relative p-10 text-center h-[362px]">
                <div class="absolute top-0 left-0 w-full h-full opacity-100 z-[0] mix-blend-multiply">
                    @if (isset($item['image']['sizes']['medium']))
                        <x-image :src="$item['image']['url']" :alt="$item['image']['alt']" />
                    @endif
                </div>
                <h4 class="text-white relative z-1 ">
                    {!! $item['link']['title'] !!}
                </h4>
                <div class="arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="32" viewBox="0 0 18 32"
                        fill="none">
                        <path d="M1 1L16 16L1 31" stroke="white" stroke-width="2" />
                    </svg>
                </div>
            </a>
            @php($i++)
        @endforeach
    </div>
@endif
