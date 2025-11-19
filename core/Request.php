<?php
class Request
{
    public function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function uri()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uri = strtok($uri, '?');
        $uri = rtrim($uri, '/');
        return $uri === '' ? '/' : $uri;
    }

    public function input($key, $default = null)
    {
        return isset($_POST[$key]) ? htmlspecialchars(trim($_POST[$key])) : $default;
    }

    public function query($key, $default = null)
    {
        return isset($_GET[$key]) ? htmlspecialchars(trim($_GET[$key])) : $default;
    }

    public function all()
    {
        return array_map('htmlspecialchars', $_POST);
    }
}
