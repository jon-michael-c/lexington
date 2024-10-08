<div class="stats grid md:grid-cols-2 lg:grid-cols-3">
    @if ($stats)
        @foreach ($stats as $stat)
            <div class="stat py-12 text-center">
                <h2 class="font-Eina font-light text-ocean mb-4">{!! $stat['value'] !!}</h2>
                <p class="text-taupe">{!! $stat['label'] !!}</p>
            </div>
        @endforeach
    @endif
</div>
