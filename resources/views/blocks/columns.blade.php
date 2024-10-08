@if ($columns_type === '1/3')
    <div class="grid sm:grid-cols-12 gap-6">
        <div class="col-span-3">
            <InnerBlocks />
        </div>
        <div class="md:col-span-1"></div>
        <div class="col-span-8">
            <div class="w-full sm:aspect-[2]">
                @if ($image)
                    <img class="w-full h-full object-cover" src="{{ $image['url'] }}" alt="{{ $image['alt'] }}">
                @endif
            </div>
        </div>
    </div>
@elseif ($columns_type === '1/2')
    <div class="grid sm:grid-cols-12 items-center gap-6 min-h-[600px]">
        <div class="col-span-5">
            <InnerBlocks />
        </div>
        <div class="md:col-span-1"></div>
        <div class="col-span-6 h-full relative">
            <div class="w-full h-full absolute top-0 left-0">
                @if ($image)
                    <img class="w-full h-full object-cover" src="{{ $image['url'] }}" alt="{{ $image['alt'] }}">
                @endif
            </div>
        </div>
    </div>
@elseif ($columns_type === '1/3-reverse')
    <div class="grid sm:grid-cols-12 gap-6">
        <div class="col-span-8">
            <div class="w-full sm:aspect-[2]">
                @if ($image)
                    <img class="w-full h-full object-cover" src="{{ $image['url'] }}" alt="{{ $image['alt'] }}">
                @endif
            </div>
        </div>
        <div class="md:col-span-1"></div>
        <div class="col-span-3">
            <InnerBlocks />
        </div>
    </div>
@elseif ($columns_type === '1/2-reverse')
    <div class="grid sm:grid-cols-12 items-center gap-6 min-h-[600px]">
        <div class="col-span-6 h-full relative">
            <div class="w-full h-full absolute top-0 left-0">
                @if ($image)
                    <img class="w-full h-full object-cover" src="{{ $image['url'] }}" alt="{{ $image['alt'] }}">
                @endif
            </div>
        </div>

        <div class="md:col-span-1"></div>
        <div class="col-span-5">
            <InnerBlocks />
        </div>

    </div>
@else
    <div class="grid sm:grid-cols-12 gap-6">
        <div class="col-span-6">
            <InnerBlocks />
        </div>
        <div class="md:col-span-1"></div>
        <div class="col-span-5">
            <div class="w-full h-full">
                @if ($image)
                    <img class="w-full h-full object-cover" src="{{ $image['url'] }}" alt="{{ $image['alt'] }}">
                @endif
            </div>
        </div>
    </div>
@endif
