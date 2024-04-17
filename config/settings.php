<?php
return [
    'settings' => [
        'displayErrorDetails' => false,
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header
       // Slim Settings
       'determineRouteBeforeAppMiddleware' => false,
       'db' => [
           'driver' => 'pgsql',
           'host' => 'XXXXXX',
           'database' => 'XXX',
           'username' => 'XXX',
           'password' => 'XXX',
           'charset'   => 'utf8',
           'collation' => 'utf8_unicode_ci',
           'prefix'    => '',
       ],
    ],
];
