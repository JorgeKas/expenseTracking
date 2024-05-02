<?php

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');


$router->get('/notes','controllers/notes/index.php')->only('auth');
$router->get('/note', 'controllers/notes/show.php');
$router->delete('/note', 'controllers/notes/destroy.php');

// Show the form to edit a note
$router->get('/note/edit', 'controllers/notes/edit.php');
// Submit the update(s) on a note
$router->patch('/note', 'controllers/notes/update.php');


// Request to show the form for new note creation
$router->get('/notes/create', 'controllers/notes/create.php');
// Request to create a new note 
$router->post('/notes', 'controllers/notes/store.php');

// Show the form to register a new user
$router->get('/register', 'controllers/registration/create.php')->only('guest');
$router->post('/register', 'controllers/registration/store.php')->only('guest');

$router->get('/login', 'controllers/session/create.php')->only('guest');
$router->post('/session', 'controllers/session/store.php')->only('guest');
$router->delete('/session', 'controllers/session/destroy.php')->only('auth');

//$router->get('', '');
//$router->get('', '');

