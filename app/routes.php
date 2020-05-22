<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// Closure route example

$router->get('/', function ($request, $response) {
    return $response->view('hello', ['framework' => 'Legion Framework']);
});

// Group route example

$router->group(['namespace' => 'App\\Controllers\\'], function ($router) {
    // Controller controller example
    $router->get('/about', 'HomeController::actionAboutGet');
});

$router->get('/my-route', function ($request, $response) {
    $log = new Logger('name');
    $log->pushHandler(new StreamHandler('php://stdout', Logger::WARNING));
    
    $log->warning('Foo');
    $log->error('Bar');
    return $response->create('Hello World!');
});