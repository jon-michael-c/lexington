@php
    if (!isset($block->block->backgroundColor)) {
        $block->block->backgroundColor = '';
    }
@endphp


@if ($reverse)
    <div class="image-bg py-16 ">
        <div class="absolute top-0 right-0 w-[50vw] h-full z-[-1]">

        </div>
        @if (isset($image) && isset($image['url']))
            <div class="absolute top-0 right-0 w-[50vw] h-full z-[0]">

                <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}" class="w-full h-full object-cover">
            </div>
        @endif

        <div class="relative max-w-[412px] mx-auto z-[2]">
            <InnerBlocks />
        </div>
    </div>
@else
    <div class="image-bg  py-16 pr-4">
        <div class="absolute  top-0 left-0 w-[50vw] h-full z-[-1]">

        </div>
        @if (isset($image) && isset($image['url']))
            <div class="absolute  top-0 left-0 w-[50vw] h-full z-[0]  ">

                <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}" class="w-full h-full object-cover">
            </div>
        @endif

        <div class=" relative z-[2]">
            <InnerBlocks />
        </div>
    </div>

@endif
