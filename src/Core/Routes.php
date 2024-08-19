<?php
namespace Core;

class Routes {
    private $routes = [];

    public function add($method, $route, $callback) {
        $this->routes[] = [
            'method' => strtoupper($method),
            'route' => $route,
            'callback' => $callback
        ];
    }
    public function run() {
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes as $route) {
            if ($requestMethod === $route['method'] && $requestUri === $route['route']) {
                if (is_callable($route['callback'])) {
                    call_user_func($route['callback']);
                } elseif (is_string($route['callback'])) {
                    $this->invokeController($route['callback']);
                }
                return;
            }
        }
        http_response_code(404);
        include "index.html";
    }
    private function invokeController($callback) {
        [$controllerName, $methodName] = explode('::', $callback);
        $controllerClass = "App\\controller\\$controllerName";

        if (class_exists($controllerClass)) {
            $controller = new $controllerClass();
            if (method_exists($controller, $methodName)) {
                $controller->$methodName();
            } else {
                echo "Method $methodName not found in controller $controllerClass";
            }
        } else {
            echo "Controller $controllerClass not found";
        }
    }
}