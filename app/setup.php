<?php

/**
 * Theme setup.
 */

namespace App;

use function Roots\bundle;

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    bundle('app')->enqueue();
}, 100);


/**
 * Add defer attribute to the app.js script.
 *
 * @param string $tag HTML script tag.
 * @param string $handle Script handle.
 * @return string Modified HTML script tag.
 */
add_filter('script_loader_tag', function ($tag, $handle) {
    // Check if the handle is for the app bundle and add defer
    if ($handle === 'app') {
        return str_replace(' src', ' defer src', $tag);
    }
    return $tag;
}, 10, 2);

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
    bundle('editor')->enqueue();
}, 100);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    /**
     * Disable full-site editing support.
     *
     * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
        'secondary_navigation' => __('Secondary Navigation', 'sage'),
    ]);

    /**
     * Disable the default block patterns.
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable responsive embed support.
     *
     * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style',
    ]);

    /**
     * Enable selective refresh for widgets in customizer.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
     */
    add_theme_support('customize-selective-refresh-widgets');
}, 20);

/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary',
    ] + $config);

    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id' => 'sidebar-footer',
    ] + $config);
});


// Allow SVG uploads
add_filter('upload_mimes', function ($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
});
function send_contact_email()
{
    $first_name = sanitize_text_field($_POST['firstName']);
    $last_name = sanitize_text_field($_POST['lastName']);
    $email = sanitize_email($_POST['email']);
    $company = sanitize_text_field($_POST['company']);
    $telephone = sanitize_text_field($_POST['telephone']);
    $country = sanitize_text_field($_POST['country']);
    $investor_type = sanitize_text_field($_POST['investorType']);
    $message = sanitize_textarea_field($_POST['message']);

    $to = 'your-email@example.com';
    $subject = 'New Contact Form Submission';
    $headers = array('Content-Type: text/html; charset=UTF-8', 'From: ' . $email);

    $body = "
    <html>
    <body>
    <p>First Name: $first_name</p>
    <p>Last Name: $last_name</p>
    <p>Email: $email</p>
    <p>Company: $company</p>
    <p>Telephone: $telephone</p>
    <p>Country/Region: $country</p>
    <p>Investor Type: $investor_type</p>
    <p>Message: $message</p>
    </body>
    </html>";

    if (true) {
        wp_send_json_success('Thank you for your message!');
    } else {
        wp_send_json_error('There was an error sending your message. Please try again later.');
    }
}

// Register the AJAX actions
add_action('wp_ajax_send_contact_email', 'send_contact_email');
add_action('wp_ajax_nopriv_send_contact_email', 'send_contact_email');


// Add Google Tag Manager code to the head, after the opening head tag from options
add_action('wp_head', function () {
    $google_tag_manager_snippet = get_field('google_tag_manager_snippet', 'option');
    if ($google_tag_manager_snippet) {
        echo $google_tag_manager_snippet;
    }

    $google_analytics = get_field('google_analytics_snippet', 'option');
    if ($google_analytics) {
        echo $google_analytics;
    }
}, 1);

// Add code after the opening <head> tag
add_action('wp_head', function () {
    if ($code = get_field('after_opening_head', 'option')) {
        echo $code;
    }
}, 1); // Priority 1 to ensure it runs first

// Add code before the closing </head> tag
add_action('wp_head', function () {
    if ($code = get_field('before_closing_head', 'option')) {
        echo $code;
    }
}, 100); // Priority 100 to ensure it runs last

// Add code after the opening <body> tag
add_action('wp_body_open', function () {
    if ($code = get_field('after_opening_body', 'option')) {
        echo $code;
    }
});

// Add code before the closing </body> tag
add_action('wp_footer', function () {
    if ($code = get_field('before_closing_body', 'option')) {
        echo $code;
    }
});

