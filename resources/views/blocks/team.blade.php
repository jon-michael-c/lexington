@php
    $team = get_posts([
        'post_type' => 'team-member',
        'posts_per_page' => -1,
        'order' => 'DESC',
        'fields' => 'ids',
    ]);

    $allLocations = get_terms([
        'taxonomy' => 'location',
        'hide_empty' => true,
    ]);

    $locations = [];

    foreach ($allLocations as $location) {
        $locations[] = [
            'value' => $location->slug,
            'label' => $location->name,
        ];
    }

    $allTitles = [];
    foreach ($team as $id) {
        $title = get_field('role', $id);
        $allTitles[] = $title;
    }

    // Remove duplicates
    $allTitles = array_unique($allTitles);

    $titles = [];
    foreach ($allTitles as $title) {
        $titles[] = [
            'value' => $title,
            'label' => $title,
        ];
    }

    $options = [
        [
            'value' => 'option1',
            'label' => 'Option 1',
        ],
        [
            'value' => 'option2',
            'label' => 'Option 2',
        ],
        [
            'value' => 'option3',
            'label' => 'Option 3',
        ],
    ];

@endphp

<div>
    <div class="w-full grid gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 sm:gap-8 pb-12">
        <x-select :options="$locations" />
        <x-select :options="$titles" />
        <x-select :options="$options" />
        <x-search />
        <div>
            <a href="{{ home_url('team') }}" class="text-ocean uppercase link">Search</a>
        </div>

    </div>
    <div class="grid gap-4 sm:gap-10 xs:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @foreach ($team as $id)
            @include('partials.team.preview', ['id' => $id])
        @endforeach
    </div>
</div>
