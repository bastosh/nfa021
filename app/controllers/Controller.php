<?php


namespace Simple\App\Controllers;


class Controller
{

  /**
   * Return an array with errors if the values are empty
   * @param $values
   * @return array
   */
  protected function validate($values)
  {

    $errors = [];

    foreach ($values as $key => $value) {

      if (empty($value)) {
        $errors[] = ucfirst($key)." is required";
      }

    }

    return $errors;
  }
}