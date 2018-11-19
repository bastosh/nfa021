<?php

$config = require '../config.php';
require '../vendor/autoload.php';
require '../config.php';

return new QueryBuilder(
  Connection::make($config['database'])
);