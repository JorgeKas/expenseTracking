<?php

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');


$router->get('/notes','notes/index.php')->only('auth');
$router->get('/note', 'notes/show.php');
$router->delete('/note', 'notes/destroy.php');

// Show the form to edit a note
$router->get('/note/edit', 'notes/edit.php');
// Submit the update(s) on a note
$router->patch('/note', 'notes/update.php');


// Request to show the form for new note creation
$router->get('/notes/create', 'notes/create.php');
// Request to create a new note 
$router->post('/notes', 'notes/store.php');

// Show the form to register a new user
$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php')->only('guest');

$router->get('/login', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest');
$router->delete('/session', 'session/destroy.php')->only('auth');

//$router->get('', '');
//$router->get('', '');

