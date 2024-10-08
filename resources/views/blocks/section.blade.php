@php
    if (!isset($block->block->backgroundColor)) {
        $block->block->backgroundColor = '';
    }
@endphp

<x-section :bgColor="$block->block->backgroundColor">
    <InnerBlocks />
</x-section>
