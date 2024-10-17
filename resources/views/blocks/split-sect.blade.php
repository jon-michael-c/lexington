@php
    $classes = '';
    if (!isset($align)) {
        $align = 'center';
    } else {
        $classes = $classes . $align;
    }

    // Get block classes
    if (isset($block->block->class)) {
        $classes = $classes . ' ' . $block->block->class;
    }

@endphp
<div class="full-width break-right split-sect py-8 sm:py-16 {{ $classes }}">
    <InnerBlocks />
</div>
