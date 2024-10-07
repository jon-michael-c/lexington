@php
    $stats = [
        [
            'number' => '30+',
            'description' => 'Years Since Inception',
        ],
        [
            'number' => '$75B+',
            'description' => 'Total Capitalization',
        ],
        [
            'number' => '900+',
            'description' => 'GP Relationships',
        ],
        [
            'number' => '180+',
            'description' => 'Professionals, including 70+ <br/> Investment Professionals',
        ],
        [
            'number' => '9',
            'description' => 'Global Offices <br/> Across 6 Countries',
        ],
        [
            'number' => '18',
            'description' => 'Years of Average <br/> Partner Tenure',
        ],
    ];
@endphp
<section class="full-width bg-mist-300">
    <div class="stats grid sm:grid-cols-2 md:grid-cols-3">
        @foreach ($stats as $stat)
            <div class="stat py-12 text-center">
                <h2 class="font-Eina font-light text-ocean mb-4">{!! $stat['number'] !!}</h2>
                <p class="text-taupe">{!! $stat['description'] !!}</p>
            </div>
        @endforeach

    </div>
</section>
