<?php

class Connection
{

  public static function make() {
    try {
      return $pdo = new PDO(DATABASE, LOGIN, PASSWORD);
    } catch(PDOException $e) {
      die($e->getMessage());
    }
  }

}
