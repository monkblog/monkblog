<?php

$demoName = 'monk-demo';
$demoYml = base_path('themes/'. $demoName .'/theme.yml');
$demoExists = ( file_exists( $demoYml ) ) ? true : false;

return [
    'folder' => base_path('themes/'),
    'demo_yml_path' => $demoYml,
    'demo_exist' => $demoExists,
    'demo_array' => ( $demoExists ) ? Parser::yaml( $demoYml ) : [],
    'demo_name' => $demoName,
    'current' => [
        'name' => $demoName,
    ]
];