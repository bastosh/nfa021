<?php

require '../vendor/autoload.php';
$config = require '../config.php';

return new QueryBuilder(
  Connection::make($config['database'])
);