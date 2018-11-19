<?php

class FeaturesController
{
  public function index()
  {
    $features = App::get('database')->selectAll('features', 'Feature');
    $title = 'Features';
    return view('pages.features', compact('title', 'features'));
  }

  public function store()
  {
    App::get('database')->insert('features', [
      'title' => $_POST['title'],
      'description' => $_POST['description']
    ]);

    header('Location: /features');
  }

}