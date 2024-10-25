<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'homeUrl' => home_url(),
            'siteName' => $this->siteName(),
            'siteLogo' => get_field('logo', 'option'),
            'feedDir' => get_theme_root() . '/' . get_template() . '/resources/data',
        ];
    }

    /**
     * Returns the site name.
     *
     * @return string
     */
    public function siteName()
    {
        return get_bloginfo('name', 'display');
    }

    /**
     * Returns site copyright.
     * 
     * @param mixed $foundingYear
     * @return string
     */
    public function copyright($foundingYear)
    {
        $currentYear = date('Y');

        if ($foundingYear == $currentYear) {
            return '© ' . $foundingYear;
        }
        return '© ' . $foundingYear . ' - ' . $currentYear;
    }

    function get_asset_url(string $path): string
    {
        $manifest_path = get_template_directory() . '/public/js/manifest.json';
        if (!file_exists($manifest_path)) {
            return get_template_directory_uri() . '/public/js/' . $path;
        }

        $manifest = json_decode(file_get_contents($manifest_path), true);

        if (isset($manifest[$path]['file'])) {
            return get_template_directory_uri() . '/public/js/' . $manifest[$path]['file'];
        }

        return get_template_directory_uri() . '/public/js/' . $path;
    }

}
