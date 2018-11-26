<?php


namespace Simple\App\Controllers;


class Controller
{
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