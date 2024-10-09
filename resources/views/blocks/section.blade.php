@php
    if (!isset($block->block->backgroundColor)) {
        $block->block->backgroundColor = '';
    }

    if (!isset($block->block->textColor)) {
        $block->block->textColor = '';
    }
@endphp

<x-section :bgColor="$block->block->backgroundColor" :textColor="$block->block->textColor">
    <InnerBlocks />
</x-section>
