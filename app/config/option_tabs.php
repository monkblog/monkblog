<?php

$optionTabs = [ ];

$optionTabs[] = [
    'slug' => 'general',
    'options' => [
        'site_title' => Config::get( 'site.title' ),
        'tagline' => Config::get( 'site.tagline' ),
        'monk_version' => Config::get( 'site.version' ),
    ]
];

$optionTabs[] = [
    'slug' => 'contact_info',
    'options' => [
        'email' => Config::get( 'site_contact.email' ),
        'facebook' => Config::get( 'site_contact.facebook' ),
        'twitter' => Config::get( 'site_contact.facebook' ),
    ]
];

return $optionTabs;