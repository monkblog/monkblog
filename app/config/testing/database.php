<?php

return [

    'default' => 'mysql',

    'connections' => [
        'mysql' => [
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'test',
            'username'  => getenv( 'MYSQL_USER' ),
            'password'  => getenv( 'MYSQL_PASSWORD' ),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ],
    ]
];
