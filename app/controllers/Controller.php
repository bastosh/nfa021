<?php

namespace Simple\App\Controllers;

use Simple\Core\App;

abstract class Controller
{

  /**
   * Return an array with errors if the values are empty
   * @param $values
   * @return array
   */
  protected function validateFeature($values)
  {

    $errors = [];

    foreach ($values as $key => $value) {

      if (empty($value)) {
        $errors[] = 'Vous devez renseigner une spécialité';
      } elseif (strlen($value) < 3) {
        $errors[] = 'La spécialité doit comporter au moins 3 caractères.';
      }
    }
    return $errors;
  }

  protected function validateGuide($values)
  {

    //var_dump($values);die;

    $errors = [];

    foreach ($values as $key => $value) {

      if (empty($value)) {
        $errors[] = 'Vous devez renseigner un titre';
      } elseif (strlen($value) < 3) {
        $errors[] = 'Le titre doit comporter au moins 3 caractères.';
      }
    }

    return $errors;
  }

  /**
   * @param $view
   * @param array $parameters
   * @return null
   * @throws \Exception
   */
  protected function render($view, $parameters = [])
  {
    $parts = explode('.', $view);
    echo App::get('twig')->render("{$parts[0]}/{$parts[1]}.html.twig", $parameters);
    return null;
  }

}
