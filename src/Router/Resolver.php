<?php

namespace GralhaFW\Router;

class Resolver {

    private $method;
    private $uri;
    private $url_params;

    public function __construct(string $method, string $uri, ?array $url_params) {
        $this->method = $method;
        $this->uri = $uri;
        $this->url_params = $url_params;
    }
     
    public function resolve() {
        $routes = include "config/routes.php";

        if (array_key_exists($this->uri, $routes[$this->method])) {
            $obj = $routes[$this->method][$this->uri];
            \GralhaFW\ServiceContainer\Resolver::get($obj)($this->url_params);
            return;
        }

        // 404 Response
        die('Not Found');
    }

    public static function factory() {
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $url_params);

        return new self(
            $_SERVER['REQUEST_METHOD'],
            $url['path'],
            $url_params
        );
    }
}