<?php
class Router
{
    protected $routes = [];

    public function get($path, $callback)
    {
        $this->routes['GET'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['POST'][$path] = $callback;
    }

    public function dispatch($request)
    {
        $method = $request->method();
        $uri = $request->uri();

        if (isset($this->routes[$method][$uri])) {
            return call_user_func($this->routes[$method][$uri], $request);
        }else{
            http_response_code(404);
            echo "No puede acceder a este módulo";
        }
    }
}