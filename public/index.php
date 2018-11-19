<?php

$query = require '../core/bootstrap.php';

switch($_SERVER['REQUEST_URI'])
{
  case '/'          : require '../app/controllers/home.php';       break;
  case '/about'     : require '../app/controllers/about.php';      break;
  case '/contact'   : require '../app/controllers/contact.php';    break;
  case '/features'  : require '../app/controllers/features.php';   break;
  default : require '../app/controllers/home.php';
}
