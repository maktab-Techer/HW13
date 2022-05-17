<?php

use App\Core\Application;
use App\Core\Router;

require_once __DIR__.'/vendor/autoload.php';

$app= new Application();
$app->get('/',[ new App\Controller\Control, "home"]);
// $app->get()
$app->get('/Dashboard',[ new App\Controller\Control, "Dashboard"]);
$app->get('/login',[ new App\Controller\Control, "login"]);
$app->get('/register',[ new App\Controller\Control, "register"]);



$app->run();


?>







