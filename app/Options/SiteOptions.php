<?php

namespace App\Options;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Options as Field;

class SiteOptions extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Site Options';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'Site Options | Options';

    /**
     * The option page field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('site_options');

        $fields
            /**
             * General Tab
             */
            ->addTab('General', [
                'placement' => 'left',
            ])
            ->addImage('logo', [
                'label' => 'Logo',
                'instructions' => 'Upload your logo here.',
                'return_format' => 'url',
            ])
            ->addImage('footer_logo', [
                'label' => 'Footer Logo',
                'instructions' => 'Upload your footer logo here.',
                'return_format' => 'url',
            ])
            /**
             * Contact Info Tab
             */
            ->addTab('Contact Info', [
                'placement' => 'left',
            ])
            ->addRepeater('Locations', [
                'label' => 'Locations',
                'instructions' => 'Add your locations information here.',
                'layout' => 'block',
                'button_label' => 'Add Info',
            ])
            ->addText('location_name', [
                'label' => 'Location Name',
            ])
            ->addGoogleMap('location_map', [
                'label' => 'Location Map',
                'instructions' => 'Add your location map here.',
                'center_lat' => '40.7128',
                'center_lng' => '-74.0060',
                'zoom' => 10,
            ])
            ->endRepeater()
            /**
             * Social Media Tab
             */
            ->addTab('Social Media', [
                'placement' => 'left',
            ])
            ->addRepeater('social_media', [
                'label' => 'Social Media',
                'instructions' => 'Add your social media links here.',
                'layout' => 'block',
                'button_label' => 'Add Link',
            ])
            ->addText('social_name', [
                'label' => 'Social Media Name',
                'instructions' => 'Add your social media name here.',
            ])
            ->addImage('social_icon', [
                'label' => 'Social Media Icon',
                'instructions' => 'Upload your social media icon here.',
                'return_format' => 'url',
            ])
            ->addLink('social_url', [
                'label' => 'Social Media Link',
                'instructions' => 'Add your social media link here.',
            ])
            ->endRepeater()
            /**
             * Google Maps Tab
             */
            ->addTab('Google Maps', [
                'placement' => 'left',
            ])
            ->addText('google_maps_api_key', [
                'label' => 'Google Maps API Key',
                'instructions' => 'Add your Google Maps API key here.',
            ])
            ->addText('google_maps_style', [
                'label' => 'Map Style ID',
                'instructions' => 'Add your Google Maps style here.',
            ])
            ->addImage('google_maps_marker', [
                'label' => 'Custom Map Marker',
                'instructions' => 'Upload your custom map marker here.',
                'return_format' => 'url',
            ])
            /**
             * Google Analytics Tab
             */
            ->addTab('Google Analytics', [
                'placement' => 'left',
            ])
            ->addTextarea('google_analytics_snippet', [
                'label' => 'Google Analytics',
                'instructions' => 'Add your Google Analytics code here.',
            ])
            /**
             * 404 Page Tab
             */
            ->addTab('404 Page', [
                'placement' => 'left',
            ])
            ->addText('404_title', [
                'label' => '404 Title',
                'instructions' => 'Add your 404 title here.',
            ])
            ->addTab('Email Settings', [
                'placement' => 'left',
            ])
            ->addText('email_address', [
                'label' => 'Email Address',
                'instructions' => 'Add your email address here.',
            ])
            ->addTab('Legal', [
                'placement' => 'left',
            ])
            ->addNumber('copyright_first_year', [
                'label' => 'Copyright First Year',
                'instructions' => 'Add your first year here.',
            ])
            ->addWysiwyg('disclaimer', [
                'label' => 'Footer Disclaimer',
                'instructions' => 'Add your footer disclaimer here.',
                'toolbar' => 'full',
            ])
        ;

        return $fields->build();
    }
}
