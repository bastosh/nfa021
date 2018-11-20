<?php

namespace Simple\Core\Database;

class Connection
{

  public static function make($config) {
    try {
      return $pdo = new \PDO($config['dsn'], $config['login'], $config['password'], $config['options']);
    } catch(\PDOException $e) {
      die($e->getMessage());
    }
  }

}
