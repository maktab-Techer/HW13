<?php

use App\Core\Application;
use App\Core\Router;

require_once __DIR__.'/vendor/autoload.php';

$app= new Application();
$app->get('/',[  App\Controller\Control::class, "home"]);
// $app->get()
$app->get('/Dashboard',[  App\Controller\Control::class, "Dashboard"]);
$app->get('/login',[  App\Controller\Control::class, "login"]);
$app->get('/register',[  App\Controller\Control::class, "register"]);



$app->run();


?>







