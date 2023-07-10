<?php

require_once('../Bootstrap/app.php');

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', [new App\Controllers\IndexController(), 'index']);
    $r->addRoute('GET', '/login', [new App\Controllers\AuthController(), 'login']);
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo "Nav";
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        //hande restricted
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $class = $handler[0];
        $func = $handler[1];
        $vars = $routeInfo[2];
        if ($vars) {
            call_user_func(array($class,$func), $vars);
        } else {
            call_user_func(array($class,$func));
        }
        break;
}
