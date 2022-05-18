<?php

use Core\Application;


require_once dirname(__DIR__).'/vendor/autoload.php';

$app=Application::GETCLASS();
$app->get('/',[  App\Controller\showController::class, "home"]);
$app->get('/Dashboard',[  App\Controller\showController::class, "Dashboard"]);
$app->get('/login',[  App\Controller\showController::class, "login"]);
$app->get('/register',[  App\Controller\showController::class, "register"]);



$app->run();


?>







