<ul class="primaryMenu  ">
    @foreach ($menu as $item)
        <li class="menu-item relative [&:not(:last-child)]:mb-4 sm:[&:not(:last-child)]:mb-8  {!! $item['classes'] !!}">
            <a target="{{ $item['target'] }}" href="{{ $item['url'] }}"
                class="text-white uppercase font-normal block">{{ $item['title'] }}</a>
        </li>
    @endforeach
</ul>
