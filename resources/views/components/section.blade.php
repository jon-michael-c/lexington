@php
    $classes = '';

    if (isset($bgColor) && !empty($bgColor)) {
        $classes .= ' bg-' . $bgColor;
    }

    if (isset($textColor) && !empty($textColor)) {
        $classes .= ' text-' . $textColor;
    }

    if ($pad) {
        if ($pad === 'sm') {
            $classes .= ' py-4 sm:py-8';
        } elseif ($pad === 'md') {
            $classes .= ' py-8 sm:py-16';
        } elseif ($pad === 'lg') {
            $classes .= ' py-24 sm:py-32';
        } elseif ($pad === 'none') {
            $classes .= ' py-0 sm:py-0';
        } else {
            $classes .= ' py-8 sm:py-24';
        }
    } else {
        $classes .= ' py-8 sm:py-24';
    }
@endphp

<section class="full-width {{ $classes }}">
    {{ $slot }}
</section>
