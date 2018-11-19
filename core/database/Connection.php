<?php

class Connection
{

  public static function make($config) {
    try {
      return $pdo = new PDO($config['dsn'], $config['login'], $config['password']);
    } catch(PDOException $e) {
      die($e->getMessage());
    }
  }

}
