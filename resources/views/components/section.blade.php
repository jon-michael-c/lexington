@php
    $classes = '';

    if (isset($bgColor) && !empty($bgColor)) {
        $classes .= ' bg-' . $bgColor;
    }
@endphp

<section class="full-width py-8 sm:py-24 {{ $classes }}">
    {{ $slot }}
</section>
