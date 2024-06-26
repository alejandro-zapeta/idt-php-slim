<?php 
use Slim\App; 
use App\Utility\Configuration;
use Illuminate\Database\Capsule\Manager;

return static function (App $app) {
    $container = $app->getContainer();
    //$dbSettings = $container->get(Configuration::class)->get('db');

    // boot eloquent
    $capsule = new Illuminate\Database\Capsule\Manager;
    $capsule->addConnection([
        'driver' => 'pgsql',
        'host' => 'XX',
        'database' => 'XXX',
        'username' => 'XX',
        'password' => 'XXX',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ]);

    //// container file
    require_once __DIR__ . '/../src/models/Country.php';
    require_once __DIR__ . '/../src/models/State.php';

    $capsule->setAsGlobal();
    $capsule->bootEloquent();


    // DB
    $container->set('db', function () use ($capsule){
        return $capsule;
    });
};
