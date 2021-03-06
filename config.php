<?php

return [
  'env' => 'dev',
  'data-abide' => false,
  'prod' => [
    'dsn' => 'mysql:host={host};dbname={database}',
    'login' => '{login}',
    'password' => '{password}',
    'options' => []
  ],
  'dev' => [
    'dsn' => 'mysql:host=localhost;dbname=catclinic',
    'login' => 'root',
    'password' => 'root',
    'options' => [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
  ],
  'admin' => [
    'username' => '',
    'password' => '',
  ]
];
