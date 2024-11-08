<?php

class Routes {
    private $routes = [];

    public function get($route, $action) {
        $this->routes['GET'][$route] = $action;
    }

    public function post($route, $action) {
        $this->routes['POST'][$route] = $action;
    }

    public function dispatch() {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        echo $requestUri; die;
        foreach ($this->routes[$requestMethod] as $route => $action) {
            if ($route === $requestUri) {
                if (is_callable($action)) {
                    call_user_func($action);
                } elseif (is_string($action)) {
                    $this->callControllerAction($action);
                }
                return;
            }
        }
        
        // Handle 404 error if no route matched
        http_response_code(404);
        echo "404 Not Found";
    }

    private function callControllerAction($action) {
        list($controller, $method) = explode('@', $action);
        require_once "controllers/{$controller}.php";
        $controllerInstance = new $controller;
        $controllerInstance->$method();
    }
}
