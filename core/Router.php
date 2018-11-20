<?php

namespace Mvc\Core;

class Router {

  /**
   * All registered routes.
   *
   * @var array
   */
  public $routes = [
    'GET'  => [],
    'POST' => [],
    'DELETE' => [],
    'PUT' => []
  ];

  public static function load($file)
  {
    $router = new static;
    require $file;
    return $router;
  }

  /**
   * Register a GET route.
   *
   * @param  string $uri
   * @param  string $controller
   */
  public function get($uri, $controller)
  {
    $this->routes['GET'][$uri] = $controller;
  }

  /**
   * Register a DELETE route.
   *
   * @param  string $uri
   * @param  string $controller
   */
  public function delete($uri, $controller)
  {
    $this->routes['DELETE'][$uri] = $controller;
  }

  /**
   * Register a PUT route.
   *
   * @param  string $uri
   * @param  string $controller
   */
  public function put($uri, $controller)
  {
    $this->routes['PUT'][$uri] = $controller;
  }

  /**
   * Register a POST route.
   *
   * @param  string $uri
   * @param  string $controller
   */
  public function post($uri, $controller)
  {
    $this->routes['POST'][$uri] = $controller;
  }

  public function parseUri($uri)
  {
    return preg_replace("|([0-9]+)(?=[^\/]*)|", "{id}", $uri);
  }

  public function direct($uri, $requestMethod)
  {
    $id = explode('/', $uri);

    $uri = $this->parseUri($uri);

    if ( ! array_key_exists($uri, $this->routes[$requestMethod])) {
      throw new \Exception("No route defined for this URI.");
    }

    $params = explode('@', $this->routes[$requestMethod][$uri]);

    if (isset($id[1])) {
      $params[] = $id[1];
    }

    $this->callAction(
      ...$params
    );
  }

  protected function callAction($controller, $action, $params = [])
  {

    $controller =  "Mvc\\App\\Controllers\\{$controller}";
    $controller = new $controller;

    if (! method_exists($controller, $action)) {
      throw new \Exception("Controller does not respond to the action {$action}.");
    }

    if ($params) {
      return $controller->$action($params);
    }

    return $controller->$action();
  }
}
