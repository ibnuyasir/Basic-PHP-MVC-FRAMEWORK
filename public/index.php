<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Core\Routes;
// Usage $router->('method', '/url', 'Class::method')
$router = new Routes();
$router->add('GET', '/', 'Home::index');
$router->run();