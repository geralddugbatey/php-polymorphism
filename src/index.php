

<?php


require __DIR__ . '/vendor/autoload.php';
require_once __DIR__.'/classes/route.php';
require_once __DIR__.'/dbclasses/addAmount.php';
require_once __DIR__.'/dbclasses/getAmount.php';
require_once __DIR__.'/routeclass/amountCalculation.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$router = new Router();

$router->get('/',[App\Home::class,'index']);
$router->post('/add-amount',[DBClasses\AddAmount::class,'add']);
$router->get('/get-amount',[DBClasses\GetAmount::class,'get']);
$router->get('/calculate',[RouteClass\AmountCalculation::class,'route']);



$router->resolve($_SERVER['REQUEST_URI'],strtolower($_SERVER['REQUEST_METHOD']));

