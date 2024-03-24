<?php

require 'functions.php';
require 'Database.php';
require 'router.php';

$config = require ('dbconfig.php');
$db = new Database($config['database']);