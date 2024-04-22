<?php

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');


$router->get('/notes','controllers/notes/index.php');
$router->get('/note', 'controllers/notes/show.php');
$router->delete('/note', 'controllers/notes/destroy.php');

$router->get('/note/edit', 'controllers/notes/edit.php');
$router->patch('/note', 'controllers/notes/update.php');


// Request to show the form for new note creation
$router->get('/notes/create', 'controllers/notes/create.php');
// Request to create a new note 
$router->post('/notes', 'controllers/notes/store.php');


//$router->get('', '');
//$router->get('', '');

