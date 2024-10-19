@if ($columns_type === '1/3')
    <div class="column grid sm:grid-cols-12 gap-6">
        <div class="column-content col-span-3">
            <InnerBlocks />
        </div>
        <div class="md:col-span-1"></div>
        <div class="column-image col-span-8">
            <div class="w-full sm:aspect-[2]">
                @if ($image)
                    <x-image :src="$image['url']" :alt="$image['alt']" />
                @endif
            </div>
            <div class=" w-[100vw] sm:absolute left-[50%] sm:bottom-[25%] h-[32px] z-[5]">
                <div class="stripe absolute sm:relative w-[100vw] bottom-0"></div>
            </div>
        </div>
    </div>
@elseif ($columns_type === '1/2')
    <div class="column grid sm:grid-cols-12 items-center gap-6 min-h-[600px]">
        <div class="column-content col-span-5 flex h-full items-{{ $alignment }}">
            <InnerBlocks />
        </div>
        <div class="md:col-span-1"></div>
        <div class="column-image col-span-6 h-full relative">
            <div class="w-full h-full absolute top-0 left-0">
                @if ($image)
                    <x-image :src="$image['url']" :alt="$image['alt']" />
                @endif
            </div>
            @if ($stripes)
                <div class="w-[100vw] sm:absolute left-[10%] sm:bottom-[15%] h-[32px] z-[5]">
                    <div class="stripe absolute sm:relative w-[100vw] bottom-0"></div>
                </div>
            @endif

        </div>
    </div>
@elseif ($columns_type === '1/3-reverse')
    <div class="column grid sm:grid-cols-12 gap-6 overflow-hidden">

        <div class="column-image col-span-8">
            <div class="w-full sm:aspect-[2]">
                @if ($image)
                    <x-image :src="$image['url']" :alt="$image['alt']" />
                @endif
            </div>
            <div class=" w-[100vw] sm:absolute left-[50%] sm:bottom-[25%] h-[32px] z-[5]">
                <div class="stripe absolute sm:relative w-[100vw] bottom-0"></div>
            </div>
        </div>
        <div class="md:col-span-1"></div>
        <div class="column-content col-span-3">
            <InnerBlocks />
        </div>
    </div>
@elseif ($columns_type === '1/2-reverse')
    <div class="column grid sm:grid-cols-12 items-center gap-6 min-h-[600px]">
        <div class="column-image col-span-6 h-full relative">
            <div class="w-full h-full absolute top-0 left-0">
                @if ($image)
                    <x-image :src="$image['url']" :alt="$image['alt']" />
                @endif
            </div>
        </div>

        <div class="md:col-span-1"></div>
        <div class="column-content col-span-5">
            <InnerBlocks />
        </div>

    </div>
@else
    <div class="column grid sm:grid-cols-12 gap-6">
        <div class="column-content col-span-6">
            <InnerBlocks />
        </div>
        <div class="md:col-span-1"></div>
        <div class="column-image col-span-5">
            <div class="w-full h-full">
                @if ($image)
                    <x-image :src="$image['url']" :alt="$image['alt']" />
                @endif
            </div>
        </div>
    </div>
@endif
