<?php


use App\Controller\ShowControl;
use App\Core\Application;
use App\Core\Router;

require_once __DIR__.'/vendor/autoload.php';

$app= new Application();
$app->get('/',[ ShowControl::class, "home"]);
// $app->get()
$app->get('/Dashboard',[ ShowControl::class, "Dashboard"]);
$app->get('/login',[ ShowControl::class, "login"]);
$app->get('/register',[ ShowControl::class, "register"]);



$app->run();


?>







