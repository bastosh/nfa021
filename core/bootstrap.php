<?php

session_start();

use Simple\Core\App;
use Simple\Core\Database\QueryBuilder;
use Simple\Core\Database\Connection;

App::bind('config', require '../config.php');

App::bind('database', new QueryBuilder(
  Connection::make(App::get('config')['database'])
));