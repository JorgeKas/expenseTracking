<?php

// A file to have ways to interact with the container
use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();

// I'll bind things to the container:
// To work w/ DB instance I should use a path to it using the namespace
// So I'm binding the key w/ a function which is responsible for building up the db instance
// The bindings array contains one item. KEY of this item is 'Core\Database' 
// and the VALUE associated with that item is a function that will built the DB class
$container->bind('Core\Database', function (){
  $config = require base_path('dbconfig.php');

  return new Database($config['database']);
});

App::setContainer($container);

//$db = $container->resolve('Core\Database');