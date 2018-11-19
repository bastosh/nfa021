<?php

return [
  'database' => [
    'dsn' => 'mysql:host=localhost;dbname=catclinic',
    'login' => 'root',
    'password' => 'root',
    'options' => [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
  ]
];
