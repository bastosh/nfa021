<?php

namespace Simple\Core\Database;

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
    $query = "SELECT * FROM {$table} WHERE id = :id";
    $statement = $this->pdo->prepare($query);
    $statement->execute(['id' => $id]);
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

  public function update($table, $params, $id)
  {
    $data = [];
    $columns = '';

    foreach ($params as $key => $value) {
      $columns .= $key. " = :".$key.", ";
      $data[":".$key] = $value;
    }
    $columns = rtrim($columns,", ");

    $query = "UPDATE {$table} SET $columns WHERE id = {$id}";

    try {
      $statement = $this->pdo->prepare($query);
      $statement->execute($data);
    } catch (\Exception $e) {
      die('Whooops. Something went wrong...');
    }

  }

  public function delete($table, $id) {
    $query = "DELETE FROM {$table} WHERE id = :id";
    $statement = $this->pdo->prepare($query);
    $statement->execute(['id' => $id]);
  }

}
