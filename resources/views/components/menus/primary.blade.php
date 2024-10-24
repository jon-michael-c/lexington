<ul
    class="primaryMenu text-xs text-white flex flex-col gap-2 items-center pt-8 pb-2 lg:py-0 lg:flex-row  lg:space-x-8 rtl:space-x-reverse lg:mt-0 lg:border-0  lg:ml-auto lg:justify-end">

    @foreach ($menu as $item)
        <li class="menu-item relative @if ($item['children']) has-children @endif {!! $item['classes'] !!}">
            @if ($item['children'])
                <span class="text-charcoal text-xs font-normal  hover:cursor-pointer text-center md:text-left">
                    {{ $item['title'] }}
                    <img src="@asset('images/submenu-arrow.svg')" alt="arrow down" class="sub-menu-arrow w-[11px] inline ml-1" />
                </span>
                <ul class="sub-menu">
                    @foreach ($item['children'] as $child)
                        <li
                            class="menu-item sub-menu-item bg-mist-100 transition-all @if ($child['children']) has-children @endif  {!! $child['classes'] !!}">
                            <a href="{{ $child['url'] }}"
                                class="text-charcoal text-xs block @if ($child['children']) has-children @endif">{!! $child['title'] !!}</a>
                            @if ($child['children'])
                                <ul class="sub-sub-menu">
                                    @foreach ($child['children'] as $subChild)
                                        <li class="menu-item sub-sub-menu-item transition-all {!! $subChild['classes'] !!}">
                                            <a href="{{ $subChild['url'] }}"
                                                class="text-charcoal text-[12px] block ">{!! $subChild['title'] !!}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            @else
                <a href="{{ $item['url'] }}"
                    class="font-normal text-charcoal text-xs block">{!! $item['title'] !!}</a>
            @endif
        </li>
    @endforeach
</ul>
