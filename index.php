<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require './vendor/autoload.php';
require './env.php';

session_start();

$app = new \App\Core\SlimCore();
$app->setEnv('view_path', __DIR__.'/view/');

return $app->buildResponse();
