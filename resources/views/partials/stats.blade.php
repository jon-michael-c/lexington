@if ($stats)
    @if (count($stats) % 3 === 0)
        <div class="stats stats-md grid md:grid-cols-2 lg:grid-cols-3">
            @foreach ($stats as $stat)
                <div class="stat py-12 text-center">
                    <h2 class="font-Eina font-light text-ocean mb-4">{!! $stat['value'] !!}</h2>
                    <p class="text-taupe">{!! $stat['label'] !!}</p>
                </div>
            @endforeach
        </div>
    @else
        <div class="stats stats-lg grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($stats as $stat)
                <div class="stat py-12 text-center">
                    <h2 class="font-Eina font-light text-ocean mb-4">{!! $stat['value'] !!}</h2>
                    <p class="text-taupe">{!! $stat['label'] !!}</p>
                </div>
            @endforeach
        </div>
    @endif
@endif
