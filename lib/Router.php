<?php

namespace Lib;

class Router
{
    private $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function get(string $path, callable|array $handler)
    {
        $this->routes['GET'][$path] = $handler;
    }

    public function post(string $path, callable|array $handler)
    {
        $this->routes['POST'][$path] = $handler;
    }

    public function dispatch()
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $path = $_SERVER['REQUEST_URI'] ?? '/';

        // check if query string exists
        if (strpos($path, '?') !== false) {
            // remove query string (?foo=bar) from the path
            $path = substr($path, 0, strpos($path, '?'));
        }

        // get handler for the route
        $handler = $this->routes[$method][$path] ?? null;

        if (!$handler) {
            http_response_code(404);
            echo view('404');
            exit;
        }

        // if handler is an array, create a new instance of the class
        if(is_array($handler)) {
            $instance = new $handler[0];
            $action = $handler[1];

            echo $instance->$action();
            exit;
        }

        // send response to the client
        echo call_user_func($handler);
    }
}
