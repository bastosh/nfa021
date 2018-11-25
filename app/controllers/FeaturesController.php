<?php

namespace Simple\App\Controllers;

use Simple\Core\App;
use Simple\Core\Flash;

class FeaturesController
{
  /**
   * GET /features
   * Show all the features
   *
   * @return mixed
   * @throws \Exception
   */
  public function index()
  {
    $features = App::get('database')->selectAll('features');
    $title = 'Features';

    return view('features.index', compact('title', 'features'));
  }

  /**
   * GET /features/{id}
   * Show a given feature
   *
   * @param $id
   * @return mixed
   * @throws \Exception
   */
  public function show($id)
  {
    $feature = App::get('database')->select('features', $id);
    if ($feature) {
      $title = 'Show feature';
      return view('features.show', compact('title', 'feature'));
    }

    return view('pages.error');
  }

  /**
   * POST /features
   * Store a feature into the database
   *
   * @throws \Exception
   */
  public function store()
  {

    App::get('database')->insert('features', [
      'title' => clean($_POST['title']),
      'description' => clean($_POST['description'])
    ]);

    Flash::message('success', 'Feature successfully created.');

    return redirect('admin');
  }

  /**
   * GET /features/{id}/edit
   * Show a form to edit a given feature
   *
   * @param $id
   * @return mixed
   * @throws \Exception
   */
  public function edit($id)
  {
    // Check if the user is already logged in
    if ((isset($_SESSION['username']) && isset($_SESSION['password']))
        && ($_SESSION['username'] === App::get('config')['admin']['username'])
        && (($_SESSION['password'] === App::get('config')['admin']['password'])))
    {

      $feature = App::get('database')->select('features', $id);
      $title = 'Edit';
      return view('features.edit', compact('title', 'feature'));

    }
    // If not ask for credentials
    else
    {
      $title = 'Connexion';
      return view('admin.login', compact('title'));
    }
  }

  /**
   * PUT /features/{id}
   * Update a given feature
   *
   * @param $id
   * @throws \Exception
   */
  public function update($id)
  {
    App::get('database')
      ->update('features', [
        'title' => clean($_POST['title']),
        'description' => clean($_POST['description'])
      ], $id);

    Flash::message('success', 'Feature successfully updated.');

    return redirect('admin');
  }

  /**
   * DELETE /features/{id}
   * Delete a given feature
   *
   * @param $id
   * @throws \Exception
   */
  public function destroy($id)
  {
    App::get('database')->delete('features', $id);

    Flash::message('success', 'Feature successfully deleted.');

    return redirect('admin');
  }

}
