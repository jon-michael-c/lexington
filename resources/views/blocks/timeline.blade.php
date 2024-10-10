<div class="timeline">
    <div class="timeline-line">
        <div class="timeline-line-progress"></div>
    </div>
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
                        <div class="timeline-content text-ocean">
                            <div class="timeline-content-bg"></div>
                            <h5 class="timeline-title font-medium">{{ $item['content']['title'] }}</h5>
                            <p class="timeline-description">{{ $item['content']['description'] }}</p>
                        </div>

                    </div>
                </li>
            @endforeach
        </ol>
    @endif
</div>
