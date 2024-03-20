<?php

function dd($value)
{
//Wrap super global with HTML pre tag
echo "<pre>";
var_dump($value);
echo "</pre>";
die();
}

function urlIs($value) {
return $_SERVER['REQUEST_URI'] === $value;
}