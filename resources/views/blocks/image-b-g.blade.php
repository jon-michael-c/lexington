@php
    if (!isset($block->block->backgroundColor)) {
        $block->block->backgroundColor = '';
    }

    $bgColor = 'bg-' . $block->block->backgroundColor;
@endphp


@if ($reverse)
    <div class="image-bg py-16 ">
        <div class="absolute top-0 right-0 w-full  sm:w-[50vw] h-full z-[-1] {{ $bgColor }}">

        </div>
        @if (isset($image) && isset($image['url']))
            <div class="absolute top-0 right-0 w-full sm:w-[50vw] h-full z-[0] opacity-1 mix-blend-multiply">

                <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}" class="w-full h-full object-cover">
            </div>
        @endif

        <div class="relative max-w-[412px] mx-auto z-[2] px-6 sm:px-0">
            <InnerBlocks />
        </div>
    </div>
@else
    <div class="image-bg  py-16 pr-4">
        <div class="absolute  top-0 left-0 w-[50vw] h-full z-[-1] {{ $bgColor }}">

        </div>
        @if (isset($image) && isset($image['url']))
            <div class="absolute  top-0 left-0 w-[50vw] h-full z-[0] opacity-1 mix-blend-multiply ">

                <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}"
                    class="w-full h-full object-cover mix-blend-multiply">
            </div>
        @endif

        <div class=" relative z-[2]">
            <InnerBlocks />
        </div>
    </div>

@endif
