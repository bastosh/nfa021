<?php

namespace Simple\Core\Database;

/**
 * Provide generic methods to
 * interact with the database
 *
 * Class QueryBuilder
 * @package Simple\Core\Database
 */
class QueryBuilder
{

  protected $pdo;

  public function __construct(\PDO $pdo)
  {
    $this->pdo = $pdo;
  }

  /**
   * Select all the items
   * form a given table
   *
   * @param $table
   * @return array
   */
  public function selectAll($table) {
    $query = "SELECT * FROM {$table}";
    try {
      $statement = $this->pdo->prepare($query);
      $statement->execute();
      return $statement->fetchAll(\PDO::FETCH_OBJ);
    } catch (\Exception $e) {
      die('Whooops. Something went wrong...');
    }
  }

  public function selectAllPublished($table) {
    $query = "SELECT * FROM {$table} WHERE published = 1";
    try {
      $statement = $this->pdo->prepare($query);
      $statement->execute();
      return $statement->fetchAll(\PDO::FETCH_OBJ);
    } catch (\Exception $e) {
      die('Whooops. Something went wrong...');
    }
  }

  /**
   * Select a given item
   * from a given table
   *
   * @param $table
   * @param $id
   * @return mixed
   */
  public function select($table, $id) {
    $query = "SELECT * FROM {$table} WHERE id = :id";
    try {
      $statement = $this->pdo->prepare($query);
      $statement->execute(['id' => $id]);
      return $statement->fetch(\PDO::FETCH_OBJ);
    } catch (\Exception $e) {
      die('Whooops. Something went wrong...');
    }
  }

  /**
   * Insert a new item
   * into a given table
   *
   * @param $table
   * @param $parameters
   */
  public function insert($table, $parameters) {
    $query = sprintf(
      "INSERT INTO %s (%s) VALUES (%s)",
      $table,
      implode(', ', array_keys($parameters)),     // Get 'title, description'
      ':'.implode(', :', array_keys($parameters)) // Get ':title, :description'
    );
    try {
      $statement = $this->pdo->prepare($query);
      $statement->execute($parameters);
    } catch (\Exception $e) {
      die('Whooops. Something went wrong...');
    }
  }

  /**
   * Update a given item
   * form a given table
   *
   * @param $table
   * @param $params
   * @param $id
   */
  public function update($table, $params, $id)
  {

    $data = []; // Initialize an array with values
    $columns = ''; // Initialize a string with "fieldname = :placeholder" pairs

    // Loop over the params
    foreach ($params as $key => $value) {
      $columns .= $key. " = :".$key.", "; // 'title = :title, description = :description,'
      $data[":".$key] = $value; // [:title => $value, :description => $value]
    }
    $columns = rtrim($columns,", "); // Remove the last ,

    $query = "UPDATE {$table} SET {$columns} WHERE id = {$id}";
    try {
      $statement = $this->pdo->prepare($query);
      $statement->execute($data);
    } catch (\Exception $e) {
      die('Whooops. Something went wrong...');
    }

  }

  /**
   * Delete a given item
   * from a given table
   *
   * @param $table
   * @param $id
   */
  public function delete($table, $id) {
    $query = "DELETE FROM {$table} WHERE id = :id";
    try {
      $statement = $this->pdo->prepare($query);
      $statement->execute(['id' => $id]);
    } catch (\Exception $e) {
      die('Whooops. Something went wrong...');
    }
  }

  public function publish($table, $id)
  {

    $query = "UPDATE {$table} SET published = 1 WHERE id = {$id}";
    try {
      $statement = $this->pdo->prepare($query);
      $statement->execute($data);
    } catch (\Exception $e) {
      die('Whooops. Something went wrong...');
    }

  }

  public function unpublish($table, $id)
  {

    $query = "UPDATE {$table} SET published = 0 WHERE id = {$id}";
    try {
      $statement = $this->pdo->prepare($query);
      $statement->execute($data);
    } catch (\Exception $e) {
      die('Whooops. Something went wrong...');
    }

  }

}
