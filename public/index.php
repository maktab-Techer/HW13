<?php

use Core\Application;
use Core\Router;

require_once dirname(__DIR__).'/vendor/autoload.php';

$app= new Application();
$app->get('/',[  App\Controller\showController::class, "home"]);
// $app->get()
$app->get('/Dashboard',[  App\Controller\showController::class, "Dashboard"]);
$app->get('/login',[  App\Controller\showController::class, "login"]);
$app->get('/register',[  App\Controller\showController::class, "register"]);



$app->run();


?>







