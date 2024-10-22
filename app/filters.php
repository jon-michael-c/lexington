<?php

/**
 * Theme filters.
 */

namespace App;
use Illuminate\Support\Str;


/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});



/**
 * Register custom page templates.
 */
add_filter('theme_page_templates', function ($templates) {
    $templates['template-legal.blade.php'] = __('Legal Template');
    return $templates;
});

/**
 * Add `rel="preload"` to font files found in the manifest
 */
add_filter('wp_head', function (): void {
    echo collect(
        json_decode(asset('manifest.json')->contents())
    )->keys()->filter(function ($item) {
        return Str::endsWith($item, ['.otf', '.eot', '.woff', '.woff2', '.ttf']);
    })->map(function ($item) {
        return sprintf(
            '<link rel="preload" href="%s" as="font" crossorigin>',
            asset($item)->uri()
        );
    })->implode("\n");
});


