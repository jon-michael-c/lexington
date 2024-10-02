<?php

/**
 * Theme filters.
 */

namespace App;

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
