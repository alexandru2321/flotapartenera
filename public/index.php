<?php
require dirname(__DIR__) . '/App/Data.php';
require dirname(__DIR__) . '/vendor/autoload.php';

error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


$router = new Core\Router();

$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('contact', ['controller' => 'Contact', 'action' => 'index']);
$router->add('c/sf', ['controller' => 'Contact', 'action' => 'sendForm']);
$router->add('livrari-tazz', ['controller' => 'Delivery', 'action' => 'tazz']);
$router->add('livrari-foodpanda', ['controller' => 'Delivery', 'action' => 'foodpanda']);
$router->add('livrari-boltfood', ['controller' => 'Delivery', 'action' => 'boltfood']);
$router->add('livrari-glovo', ['controller' => 'Delivery', 'action' => 'glovo']);
$router->add('{controller}/{action}');
    
$router->dispatch($_SERVER['QUERY_STRING']);
