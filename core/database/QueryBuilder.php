<?php

namespace Mvc\Core\Database;

class QueryBuilder
{

  protected $pdo;

  public function __construct(\PDO $pdo)
  {
    $this->pdo = $pdo;
  }

  public function selectAll($table) {
    $query = "SELECT * FROM {$table}";
    $statement = $this->pdo->prepare($query);
    $statement->execute();
    return $statement->fetchAll(\PDO::FETCH_OBJ);
  }

  public function select($table, $id) {
    $query = "SELECT * FROM {$table} WHERE id = {$id}";
    $statement = $this->pdo->prepare($query);
    $statement->execute();
    return $statement->fetch(\PDO::FETCH_OBJ);
  }

  public function insert($table, $parameters) {
    $query = sprintf(
      "INSERT INTO %s (%s) VALUES (%s)",
      $table,
      implode(', ', array_keys($parameters)),
      ':'.implode(', :', array_keys($parameters))
    );
    try {
      $statement = $this->pdo->prepare($query);
      $statement->execute($parameters);
    } catch (\Exception $e) {
      die('Whooops. Something went wrong...');
    }

  }

}
