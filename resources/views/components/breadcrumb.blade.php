<div class="breadcrumb text-white uppercase">
    @php
        $segments = Request::segments();
        $url = url('/');
        array_pop($segments); // Remove the last segment
    @endphp

    @foreach ($segments as $segment)
        @php
            $url .= '/' . $segment;
            $isCurrentPage = $loop->last;
        @endphp
        @if (!$loop->first)
            |
        @endif
        @if (count($segments) > 1)
            <strong><a href="{{ $url }}">{{ ucfirst($segment) }}</a></strong>
        @else
            <a href="{{ $url }}">{{ ucfirst($segment) }}</a>
        @endif
    @endforeach
</div>
