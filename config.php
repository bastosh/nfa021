<?php

return [
  'database' => [
    'dsn' => 'mysql:host=localhost;dbname=simple',
    'login' => 'root',
    'password' => 'root',
    'options' => [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
  ],
  'security' => [
    'username' => 'admin',
    'password' => 'root',
  ]
];
