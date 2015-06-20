<?php

$optionTabs = [ ];

$optionTabs[] = [
    'slug' => 'general',
    'options' => [
        'site_title' => ENV( 'SITE_TITLE', 'MonkBlog' ),
        'tagline' => ENV( 'SITE_TAGLINE', 'Just another MonkBlog' ),
        'monk_version' => ENV( 'SITE_VERSION', '1.5@beta' ),
    ]
];

$optionTabs[] = [
    'slug' => 'contact_info',
    'options' => [
        'email' => ENV( 'SITE_CONTACT_EMAIL', 'support@monkblog.org' ),
        'facebook' => ENV( 'SITE_CONTACT_FACEBOOK', 'monkblog' ),
        'twitter' => ENV( 'SITE_CONTACT_TWITTER', 'monkblog' ),
    ]
];

return $optionTabs;