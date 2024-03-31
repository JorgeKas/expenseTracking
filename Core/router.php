<?php

function routeToController($uri, $routes)
{
  if (array_key_exists($uri, $routes)) {
    require base_path($routes[$uri]);
  } else {
    abort();
  }
}

function abort($code = 404)
{
  http_response_code($code);
  require base_path("views/{$code}.php");
  die();
}


$routes = require base_path('routes.php');
// parse_url func. seperates uri from query string if any
// ['path'] appends to the end to return only the path variable we want
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

routeToController($uri, $routes);
