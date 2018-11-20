<?php

use Mvc\Core\App;
use Mvc\Core\Database\QueryBuilder;
use Mvc\Core\Database\Connection;

App::bind('config', require '../config.php');

App::bind('database', new QueryBuilder(
  Connection::make(App::get('config')['database'])
));