<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (!file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

if (!function_exists('\Roots\bootloader')) {
    wp_die(
        __('You need to install Acorn to use this theme.', 'sage'),
        '',
        [
            'link_url' => 'https://roots.io/acorn/docs/installation/',
            'link_text' => __('Acorn Docs: Installation', 'sage'),
        ]
    );
}

\Roots\bootloader()->boot();

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['setup', 'filters'])
    ->each(function ($file) {
        if (!locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
                /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });


function getMenu($location)
{


    $menuItems = wp_get_nav_menu_items($location);
    $menuArray = [];

    // First, convert all menu items to associative arrays and index by ID
    if ($menuItems) {
        foreach ($menuItems as $item) {
            $classes = implode(' ', $item->classes);
            if (get_the_ID() == $item->object_id) {
                $classes .= ' current-menu-item';
            }

            $menuArray[$item->ID] = [
                'id' => $item->ID,
                'title' => html_entity_decode($item->title),
                'url' => $item->url,
                'target' => $item->target,
                'parent_id' => $item->menu_item_parent,
                'classes' => $classes,
                'children' => [],
                'current' => $item->current ? true : false,
            ];
        }
    }

    // Next, iterate through the array and assign children to their parents
    foreach ($menuArray as $id => &$menuItem) {
        if ($menuItem['parent_id'] != 0) { // If item has a parent
            $menuArray[$menuItem['parent_id']]['children'][] = &$menuItem; // Add it to the parent's 'children' array
        }
    }
    unset($menuItem); // Break reference to the last element

    // Mark parent items as current if any of their children are current
    foreach ($menuArray as &$menuItem) {
        if ($menuItem['current']) {
            $parentId = $menuItem['parent_id'];
            while ($parentId != 0 && isset($menuArray[$parentId])) {
                $menuArray[$parentId]['current'] = true;
                $parentId = $menuArray[$parentId]['parent_id'];
            }
        }
    }
    unset($menuItem); // Break reference to the last element

    // Filter out the child items to get a list of top-level items only
    $menuTree = array_filter($menuArray, function ($item) {
        return $item['parent_id'] == 0;
    });

    return array_values($menuTree); // Re-index and return 
}