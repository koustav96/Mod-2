<?php
$request = $_SERVER['REQUEST_URI'];
switch ($request) {
  case '':
  case '/':
    require __DIR__ . '/home.php';
    break;
  default:
    echo"<h1>404 Not Found</h1>";
  }
  