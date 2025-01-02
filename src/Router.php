<?php

namespace MVC;

class Router {

    protected $uri;
    protected $routes = [];

    public function __construct($uri) {
        $this->uri = $uri;
    }

    public function addRoute($route, $controller, $action) {
        $this->routes[$route] = ['controller' => $controller, 'action' => $action];
    }

    public function dispatch() : void {
        if (array_key_exists($this->uri, $this->routes)) {
            $controller = $this->routes[$this->uri]['controller'];
            $action = $this->routes[$this->uri]['action'];

            $controller = new $controller();
            $controller->$action();
        } else {
            throw new \Exception("No route found for URI: $this->uri");
        }
    }
}

?>