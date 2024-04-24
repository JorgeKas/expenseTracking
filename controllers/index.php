<?php

$_SESSION['name'] = 'Jorge';

view("index.view.php", [
  'heading' => 'Home'
]);