<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
    "driver" => "mysql",
    "host" =>"127.0.0.1",
    "database" => "beejee",
    "username" => "root",
    "password" => "Gizma85451605"
]);

$capsule->setAsGlobal();

$capsule->bootEloquent();
