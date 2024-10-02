<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Footer extends Composer
{
    /**
     * List of views that utilize this composer.
     *
     * @var array
     */
    protected static $views = [
        'sections.footer', // assuming your footer Blade file is located at resources/views/sections/footer.blade.php
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'copyright' => $this->copyright(get_field('copyright_first_year', 'option') ?? date('Y')),
            'footerLogo' => $this->footerLogo(),
            'socialLinks' => $this->socialLinks(),
            'disclaimer' => $this->disclaimer(),
            'footerMenu' => getMenu('Footer Menu'),
            'legalMenu' => getMenu('Legal Menu'),
        ];
    }

    /**
     * Returns social links.
     * 
     * @return array
     */
    public function socialLinks()
    {
        $links = [];

        if (have_rows('social_media', 'option')) { // Assuming 'social_media' is your repeater field name
            while (have_rows('social_media', 'option')):
                the_row();
                $links[] = [
                    'name' => get_sub_field('social_name'),
                    'url' => get_sub_field('social_url'),
                    'icon' => get_sub_field('social_icon'), // Adjust depending on how you store icons
                ];
            endwhile;
        }

        return $links;

    }

    /**
     * Returns the footer logo.
     * 
     * @return string
     */

    public function footerLogo()
    {
        if (!function_exists('get_field')) {
            return;
        }

        if (!get_field('footer_logo', 'option')) {
            return get_field('logo', 'option');
        }

        return get_field('footer_logo', 'option');
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
        $postFix = '. All rights reserved.';
        $siteName = get_bloginfo('name', 'display');

        if ($foundingYear == $currentYear) {
            return '© ' . $foundingYear . ' ' . $siteName . $postFix;
        }
        return '© ' . $foundingYear . ' - ' . $currentYear . ' ' . $siteName . $postFix;

    }

    public function disclaimer()
    {
        return get_field('disclaimer', 'option');
    }

}
