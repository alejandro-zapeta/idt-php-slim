<?php
return [
    'settings' => [
        'displayErrorDetails' => false,
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header
       // Slim Settings
       'determineRouteBeforeAppMiddleware' => false,
       'db' => [
           'driver' => 'pgsql',
           'host' => '95.111.230.5',
           'database' => 'postgres',
           'username' => 'postgres',
           'password' => 'Manzana9090',
           'charset'   => 'utf8',
           'collation' => 'utf8_unicode_ci',
           'prefix'    => '',
       ],
    ],
];