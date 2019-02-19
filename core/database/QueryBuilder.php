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

  public function selectAll($table, $model) {
    $query = "SELECT * FROM {$table}";
    try {
      $statement = $this->pdo->prepare($query);
      $statement->execute();
      return $statement->fetchAll(\PDO::FETCH_CLASS, $model);
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }

  public function selectAllPublished($table, $model) {
    $query = "SELECT * FROM {$table} WHERE published = 1";
    try {
      $statement = $this->pdo->prepare($query);
      $statement->execute();
      return $statement->fetchAll(\PDO::FETCH_CLASS, $model);
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }

  public function selectLastPublished($table, $model, $limit) {
    $query = "SELECT * FROM {$table} WHERE published = 1 ORDER BY created_at DESC LIMIT $limit";
    try {
      $statement = $this->pdo->prepare($query);
      $statement->execute();
      return $statement->fetchAll(\PDO::FETCH_CLASS, $model);
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }

 	public function select($table, $id, $model) {
    $query = "SELECT * FROM {$table} WHERE id = :id";
    try {
      $statement = $this->pdo->prepare($query);
      $statement->execute(['id' => $id]);
      $statement->setFetchMode(\PDO::FETCH_CLASS, $model);
      return $statement->fetch();
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }

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
      die($e->getMessage());
    }

    return $this->pdo->lastInsertId();

  }

  public function update($table, $params, $id)
  {

    $data = []; // Initialize an array with values
    $columns = ''; // Initialize a string with "fieldname = :placeholder" pairs

    // Loop over the params
    foreach ($params as $key => $value) {
      $columns .= $key. " = :".$key.", "; // 'title = :title, description = :description,'
      $data[":".$key] = $value; // [:title => $value, :description => $value]
    }
    // $columns = rtrim($columns,", "); // Remove the last ,

    $query = "UPDATE {$table} SET {$columns} updated_at = NOW() WHERE id = {$id}";
    try {
      $statement = $this->pdo->prepare($query);
      $statement->execute($data);
    } catch (\Exception $e) {
      die($e->getMessage());
    }

  }

  public function delete($table, $id) {
    $query = "DELETE FROM {$table} WHERE id = :id";
    try {
      $statement = $this->pdo->prepare($query);
      $statement->execute(['id' => $id]);
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }

  public function publish($table, $id)
  {

    $query = "UPDATE {$table} SET published = 1 WHERE id = {$id}";
    try {
      $statement = $this->pdo->prepare($query);
      $statement->execute();
    } catch (\Exception $e) {
      die($e->getMessage());
    }

  }

  public function unpublish($table, $id)
  {

    $query = "UPDATE {$table} SET published = 0 WHERE id = {$id}";
    try {
      $statement = $this->pdo->prepare($query);
      $statement->execute();
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }

	public function selectGuide($id) {
				$query = "SELECT id, title, description, image_id, image_name, text_alt 
									FROM guides 
									LEFT JOIN images ON guides.id = images.guide_id  
									WHERE id = :id";
				try {
						$statement = $this->pdo->prepare($query);
						$statement->execute(['id' => $id]);
						return $statement->fetch(\PDO::FETCH_OBJ);
				} catch (\Exception $e) {
						die($e->getMessage());
				}
		}

	public function selectAllGuides() {
				$query = "SELECT id, title, description, published FROM guides";
				try {
						$statement = $this->pdo->prepare($query);
						$statement->execute();
						return $statement->fetchAll(\PDO::FETCH_OBJ);
				} catch (\Exception $e) {
						die($e->getMessage());
				}
		}

	public function selectAllPublishedGuides() {
		$query = "SELECT id, title, description, image_name, text_alt FROM guides LEFT JOIN images ON guides.id = images.guide_id WHERE published = 1";
			try {
					$statement = $this->pdo->prepare($query);
					$statement->execute();
					return $statement->fetchAll(\PDO::FETCH_OBJ);
			} catch (\Exception $e) {
					die($e->getMessage());
			}
		}

	public function updateImage($image_id, $guide_id) {
		$query = "UPDATE images SET guide_id = :guide_id, updated_at = NOW() WHERE image_id = {$image_id}";
		try {
				$statement = $this->pdo->prepare($query);
				$statement->execute(['guide_id' => $guide_id]);
		} catch (\Exception $e) {
				die($e->getMessage());
		}
	}

		public function deleteImage($id) {
				$query = "DELETE FROM images WHERE image_id = :id";
				try {
						$statement = $this->pdo->prepare($query);
						$statement->execute(['id' => $id]);
				} catch (\Exception $e) {
						die($e->getMessage());
				}
		}

}
