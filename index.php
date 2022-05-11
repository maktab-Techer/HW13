<?php

use App\Core\Application;
use App\Core\Router;

require_once __DIR__.'/vendor/autoload.php';

$app= new Application();
$app->get('/',[App\Controller\Control::class, "home"]);
$app->post("/",[App\Controller\Control::class, ""])
$app->run();







