<?php

use DI\Container;
use Symfony\Component\Console\Application;

return static function (Application $app, Container $container) {
    $capsule = new Illuminate\Database\Capsule\Manager;
    $dbSettings = $container->get('eloquent_ser');
    $capsule->addConnection($dbSettings);
    $capsule->bootEloquent();
    $capsule->setAsGlobal();
};



