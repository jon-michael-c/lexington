@php
    $team = get_posts([
        'post_type' => 'team-member',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'title',
        'fields' => 'ids',
    ]);

    $allLocations = get_terms([
        'taxonomy' => 'location',
        'hide_empty' => true,
    ]);

    $locations = [
        ['value' => '', 'label' => 'All Locations'], // Add 'All Locations' option
    ];

    foreach ($allLocations as $location) {
        $locations[] = [
            'value' => $location->name,
            'label' => $location->name,
        ];
    }

    usort($locations, function ($a, $b) {
        if ($a['label'] === 'All Locations') {
            return -1;
        }
        if ($b['label'] === 'New York') {
            return 1;
        }
        return strcmp($a['label'], $b['label']);
    });

    $allTitles = [];
    foreach ($team as $id) {
        $title = get_field('role', $id);
        $allTitles[] = $title;
    }
    // Define the custom order for roles
    $titleOrder = [
        'Partner',
        'Managing Director',
        'Director',
        'Vice President',
        'Senior Advisor',
        'Senior Associate',
        'Associate',
        'Analyst',
        'Research Analyst',
    ];

    // Create an associative array to map roles to their respective order
    $titleOrderMap = array_flip($titleOrder);

    // Normalize roles in $allTitles and sort them based on $titleOrder
    usort($allTitles, function ($a, $b) use ($titleOrderMap) {
        $aOrder = $titleOrderMap[$a] ?? PHP_INT_MAX; // Assign high value if not in $titleOrder
        $bOrder = $titleOrderMap[$b] ?? PHP_INT_MAX;
        return $aOrder <=> $bOrder; // Sort based on custom order
    });

    // Remove duplicates
    $allTitles = array_unique($allTitles);

    // Initialize the grouped array
    $groupedTeam = [];
    foreach ($allTitles as $role) {
        $groupedTeam[$role] = [];
    }

    // Group team members by role
    foreach ($team as $id) {
        $role = get_field('role', $id);
        if ($role) {
            // Match roles to the title order or leave unsorted
            if (in_array($role, $titleOrder)) {
                $groupedTeam[$role][] = [
                    'id' => $id,
                    'name' => get_the_title($id), // Get the name of the team member
                ];
            } else {
                // Handle roles not in $titleOrder
                if (!isset($groupedTeam[$role])) {
                    $groupedTeam[$role] = [];
                }
                $groupedTeam[$role][] = [
                    'id' => $id,
                    'name' => get_the_title($id),
                ];
            }
        }
    }

    // Remove empty role groups
    $groupedTeam = array_filter($groupedTeam);

    // Sort team members alphabetically within each role group
    foreach ($groupedTeam as $role => &$members) {
        usort($members, function ($a, $b) {
            // By last name
            $aName = explode(' ', $a['name']);
            $bName = explode(' ', $b['name']);
            $aLastName = end($aName);
            $bLastName = end($bName);
            return strcmp($aLastName, $bLastName);
        });
    }

    // Flatten the sorted groups into a single array of IDs in the new order
    $team = [];
    $priorityName = 'Wilson Warren'; // Change this to the desired name
    $priorityId = null;

    // Add members to the final array based on $titleOrder first
    foreach ($titleOrder as $role) {
        if (isset($groupedTeam[$role])) {
            foreach ($groupedTeam[$role] as $member) {
                if ($member['name'] === $priorityName) {
                    $priorityId = $member['id'];
                    continue;
                }
                $team[] = $member['id'];
            }
        }
    }

    // Add remaining roles (those not in $titleOrder) at the end
    foreach ($groupedTeam as $role => $members) {
        if (!in_array($role, $titleOrder)) {
            foreach ($members as $member) {
                if ($member['name'] === $priorityName) {
                    $priorityId = $member['id'];
                    continue;
                }
                $team[] = $member['id'];
            }
        }
    }

    // Add priority member to the beginning if specified
    if ($priorityId !== null) {
        array_unshift($team, $priorityId);
    }

    // Remove duplicates
    $team = array_unique($team);

    $titles = [
        ['value' => '', 'label' => 'All Titles'], // Add 'All Titles' option
    ];

    foreach ($allTitles as $title) {
        $titles[] = [
            'value' => $title,
            'label' => $title,
        ];
    }

    $allGroups = get_terms([
        'taxonomy' => 'group',
        'hide_empty' => true,
    ]);

    $groups = [
        ['value' => '', 'label' => 'All Groups'], // Add 'All Groups' option
    ];

    $groupsArray = ['Secondaries', 'Co-Investment', 'Investor Relations', 'Legal and Compliance', 'Operations'];

    foreach ($allGroups as $group) {
        $groups[] = [
            'value' => $group->name,
            'label' => $group->name,
        ];
    }

    usort($groups, function ($a, $b) use ($groupsArray) {
        if ($a['label'] === 'All Groups') {
            return -1;
        }
        $indexA = array_search($a['label'], $groupsArray);
        $indexB = array_search($b['label'], $groupsArray);

        if ($indexA === false && $indexB === false) {
            return strcmp($a['label'], $b['label']);
        }

        if ($indexA === false) {
            return 1;
        }

        if ($indexB === false) {
            return -1;
        }

        return $indexA - $indexB;
    });

    $locationS = 'location-select';
    $titleS = 'title-select';
    $groupS = 'group-select';
    $searchS = 'search-input';
@endphp


<div id="members">
    <div class="w-full grid gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 sm:gap-8 pb-12">
        <x-select :id="$locationS" :options="$locations" />
        <x-select :id="$titleS" :options="$titles" />
        <x-select :id="$groupS" :options="$groups" />
        <x-search :id="$searchS" />
    </div>

    <div id="team-members"
        class="grid gap-4 sm:gap-10 sm:gap-x-[1px] grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6">
        @foreach ($team as $id)
            @include('partials.team.preview', ['id' => $id])
        @endforeach
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const locationSelect = document.getElementById('location-select');
        const titleSelect = document.getElementById('title-select');
        const groupSelect = document.getElementById('group-select');
        const searchInput = document.getElementById('search-input');
        const teamMembers = document.getElementById('team-members');

        function filterTeamMembers() {
            const location = locationSelect.value;
            const title = titleSelect.value;
            const group = groupSelect.value;
            const search = searchInput.value.toLowerCase();

            const members = teamMembers.querySelectorAll('.team-member');

            members.forEach(member => {
                const memberLocation = member.dataset.location.toLowerCase();
                const memberTitle = member.dataset.title;
                const memberGroup = member.dataset.group;
                const memberName = member.dataset.name.toLowerCase();

                const matchesLocation = !location || memberLocation == location.toLowerCase();
                const matchesTitle = !title || memberTitle == title;
                const matchesGroup = !group || memberGroup == group;
                const matchesSearch = !search || memberName.includes(search);

                if (matchesLocation && matchesTitle && matchesGroup && matchesSearch) {
                    member.style.display = 'block';
                } else {
                    member.style.display = 'none';
                }
            });
        }

        locationSelect.addEventListener('change', filterTeamMembers);
        titleSelect.addEventListener('change', filterTeamMembers);
        groupSelect.addEventListener('change', filterTeamMembers);
        searchInput.addEventListener('input', filterTeamMembers);


        // Get url parameters and set the select values
        const urlParams = new URLSearchParams(window.location.search);
        const location = urlParams.get('location');
        const title = urlParams.get('title');
        const group = urlParams.get('group');
        const search = urlParams.get('search');

        if (location) {
            locationSelect.value = location;
        }

        if (title) {
            titleSelect.value = title;
        }

        if (group) {
            groupSelect.value = group;
        }

        if (search) {
            searchInput.value = search;
        }

        filterTeamMembers();

        // URL Example to test: https://example.com/team?location=New%20York&title=Developer&group=Management&search=John


    });
</script>
