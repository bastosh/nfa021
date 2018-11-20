<?php

namespace Simple\App\Controllers;

use Simple\Core\App;
use Simple\Core\Flash;

class FeaturesController
{
  public function index()
  {
    $features = App::get('database')->selectAll('features');
    $title = 'Features';

    return view('features.index', compact('title', 'features'));
  }

  public function show($id)
  {
    $feature = App::get('database')->select('features', $id);
    if ($feature) {
      $title = 'Show feature';
      return view('features.show', compact('title', 'feature'));
    }

    return view('pages.error');
  }

  public function store()
  {
    App::get('database')->insert('features', [
      'title' => $_POST['title'],
      'description' => $_POST['description']
    ]);

    Flash::message('success', 'Feature successfully created.');

    return redirect('admin');
  }

  public function edit($id)
  {
    $feature = App::get('database')->select('features', $id);
    $title = 'Edit';
    return view('features.edit', compact('title', 'feature'));
  }

  public function update($id)
  {
    App::get('database')
      ->update('features', [
        'title' => $_POST['title'],
        'description' => $_POST['description']
      ], $id);

    Flash::message('success', 'Feature successfully updated.');

    return redirect('admin');
  }

  public function destroy($id)
  {
    App::get('database')->delete('features', $id);

    Flash::message('success', 'Feature successfully deleted.');

    return redirect('admin');
  }

}