@if (isset($items))
    <div class="grid gap-4 md:grid-cols-{{ count($items) }} sm:gap-8 mt-6 mb-12">
        @php($i = 1)
        @foreach ($items as $item)
            <a href="{{ $item['link']['url'] }}" target="{{ $item['link']['target'] }}"
                class="relative p-10 text-center flex justify-center items-end h-[362px]">
                <div class="absolute top-0 left-0 w-full h-full opacity-100 z-[0] mix-blend-multiply">
                    @if (isset($item['image']['sizes']['medium']))
                        <x-image :src="$item['image']['url']" :alt="$item['image']['alt']" />
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
