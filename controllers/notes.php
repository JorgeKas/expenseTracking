<?php

$config = require('dbconfig.php');
$db = new Database($config['database']);

$heading = 'Notes';

require "views/notes.view.php";