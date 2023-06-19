<?php

// define constants
define('ROOT_DIR', dirname(__DIR__));
define('VIEWS_DIR', ROOT_DIR . '/views');

// load composer
require ROOT_DIR . '/vendor/autoload.php';

// load helpers
require ROOT_DIR . '/helpers.php';

// create dependency container
$di = new Lib\Container();

// load configuration
$di->set('config', function () {
    return require ROOT_DIR . '/config.php';
});

// create session
$di->singleton('session', function () {
    return new Lib\Session();
});

// create router
$di->singleton('router', function () {
    $router = new Lib\Router();
    require ROOT_DIR . '/routes.php';
    return $router;
});

// create view renderer
$di->singleton('view', function () {
    return new Lib\View();
});

// create database connection
$di->singleton('db', function ($di) {
    $config = $di->get('config');
    return new Lib\Database($config['db']);
});

// create and run application
Lib\Application::getInstance($di)->run();
