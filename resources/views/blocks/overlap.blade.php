    <div class="overlay grid grid-cols-12 gap-8 items-center relative">
        <div class="h-[80%] col-span-6 relative z-10 flex items-center justify-center p-16">
            <div class="absolute bg-azure  top-0 right-0 w-full h-full -z-[2]">
            </div>
            <div class="absolute top-0 right-0 w-full h-full -z-[1] mix-blend-multiply opacity-50">
                @if (isset($image))
                    <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}" class="w-full h-full object-cover">
                @endif
            </div>
            <div>
                <InnerBlocks />
            </div>
        </div>
        <div class="h-fit bg-mist-100 col-span-6 relative z-0 -ml-24 pl-28 py-24">
            @if (isset($items))
                <ol class="overlay-list">
                    <div class="overlay-line"></div>
                    @foreach ($items as $item)
                        <li>
                            <div class="overlay-list-item">
                                <div class="overlay-dot"></div>
                                <div class="overlay-content">
                                    <h4 class="text-ocean">{{ $item['title'] }}</h4>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ol>
            @endif
        </div>
    </div>
