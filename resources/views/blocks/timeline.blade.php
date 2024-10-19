<div class="timeline">
    <div class="top-line"></div>
    <div class="timeline-line"></div>
    <div class="timeline-line-progress">
        <div class="line"></div>

    </div>
    <div class="target-line"></div>
    @if ($items)
        <ol>
            @foreach ($items as $item)
                <li>
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-year-container">
                            <time
                                class="timeline-year text-mist font-Juana text-xl sm:text-3xl">{{ $item['year'] }}</time>
                        </div>
                        <div class="timeline-content text-ocean flex items-center">
                            <div class="timeline-content-bg"></div>
                            <div>
                                <h5 class="timeline-title font-medium">{{ $item['content']['title'] }}</h5>
                                <p class="timeline-description">{{ $item['content']['description'] }}</p>
                            </div>
                            @if (isset($item['content']['image']['url']))
                                <div class="timeline-image">
                                    <img src="{{ $item['content']['image']['url'] }}"
                                        alt="{{ $item['content']['image']['alt'] }}">
                                </div>
                            @endif
                        </div>
                    </div>
                </li>
            @endforeach
        </ol>
    @endif
</div>
