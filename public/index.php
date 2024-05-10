<?php

use Core\Session;
use Core\ValidationException;

const BASE_PATH = __DIR__ .'/../';

session_start();


require BASE_PATH .'Core/functions.php';


spl_autoload_register(function ($class) {
  $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
  require base_path("{$class}.php");
});

require base_path('bootstrap.php');

$router = new \Core\Router();

$routes = require base_path('routes.php');
// parse_url func. seperates uri from query string if any
// ['path'] appends to the end to return only the path variable we want
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

//$method = isset($_POST['_method']) ? ($_POST['_method']) : $_SERVER['REQUEST_METHOD'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try {
  $router->route($uri, $method);
} catch(ValidationException $exception)  {
  Session::flash('errors', $exception->errors);
  Session::flash('old', $exception->old);

  // Redirect back to the previous page if validation fails
  return redirect($router->previousUrl());

}



// Clear any flash session data
Session::unflash();