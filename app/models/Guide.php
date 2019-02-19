<?php

namespace Simple\App\Models;

use Simple\Core\Database\QueryBuilder;

class Guide extends QueryBuilder
{

  public $title;
  public $description;
  public $published;
  public $created_at;
  public $updated_at;

}
