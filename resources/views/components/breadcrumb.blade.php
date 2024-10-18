<div class="breadcrumb text-white uppercase">
    @php
        $segments = Request::segments();
        $url = url('/');
        $isParentPage = count($segments) <= 1; // Check if it's a parent page
$hasChildPages = function ($url) {
    // Implement your logic to check if the page has child pages
    // For example, you might query the database or check a predefined list
    $childPages = get_pages(['child_of' => get_the_ID()]);
            return !empty($childPages);
        };
    @endphp

    @if (!$isParentPage || $hasChildPages($url))
        @if ($isParentPage)
            @if ($hasChildPages($url))
                <p>Overview</p>
            @endif
        @else
            @foreach ($segments as $index => $segment)
                @if ($index < count($segments) - 1)
                    <!-- Skip the last segment -->
                    @php
                        $segment = str_replace('-', ' ', $segment);
                        $url .= '/' . $segment;
                    @endphp
                    @if ($index > 0)
                        |
                    @endif
                    <a href="{{ $url }}">{{ ucfirst($segment) }}</a>
                @endif
            @endforeach
        @endif
    @endif
</div>
