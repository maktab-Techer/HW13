<?php

use Core\Application;
use Core\DB\MySqlConnection;
use Opis\Database\Database;

require_once dirname(__DIR__).'/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();


// $app=new Application;

// $app->get('/',[  App\Controller\showController::class, "home"]);
// $app->put('/',[  App\Controller\showController::class, ""]);

// $app->get('/Dashboard',[  App\Controller\showController::class, "Dashboard"]);

// $app->get('/login',[  App\Controller\showController::class, "login"]);
// $app->post('/login',[  App\Controller\AuthController::class, "doLogin"]);

// $app->get('/register',[  App\Controller\showController::class, "register"]);
// $app->post('/register',[  App\Controller\AuthController::class, "doRegister"]);





// $app->run();

// $a = [1, 2, 3, 4, 5];
// $b = ['one', 'two', 'three', 'four', 'five'];
// $c = ['uno', 'dos', 'tres', 'cuatro', 'cinco'];

// $d = array_map(null, $a, $b, $c);
// print_r($d);



// $db = new Database(MySqlConnection::getInstance()->getConnection());
// echo"<pre>";
// var_dump(
// $db->from("doctor")->select()->all()
// );
// echo"</pre>";

?>







