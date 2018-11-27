<?php

namespace Simple\App\Controllers;

use Simple\Core\App;
use Simple\Core\Flash;

class FeaturesController extends Controller
{
  /**
   * Show all the features
   * GET /features
   * @return mixed
   * @throws \Exception
   */
  public function index()
  {

    $features = App::get('database')->selectAllPublished('features');
    $title = 'Features';

    return view('features.index', compact('title', 'features'));
  }

  /**
   * Show a given feature
   * GET /features/{id}
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
   * Show the form to create a feature
   * @return mixed
   * @throws \Exception
   */
  public function create()
  {
    // Check if the user is already logged in
    if ((isset($_SESSION['username']) && isset($_SESSION['password']))
      && ($_SESSION['username'] === App::get('config')['admin']['username'])
      && (($_SESSION['password'] === App::get('config')['admin']['password'])))
    {

      $title = 'New Feature';
      return view('features.create', compact('title'));

    }
    // If not ask for credentials
    else
    {
      $title = 'Connexion';
      return view('admin.login', compact('title'));
    }
  }

  /**
   * Store a feature into the database
   * POST /features
   * @throws \Exception
   */
  public function store()
  {

    $title = $_POST['title'];
    $description = $_POST['description'];

    $errors = $this->validate([
      'title' => $title,
      'description' => $description]
    );

    if (count($errors)) {

      $_SESSION['errors'] = $errors;

      Flash::message('alert', 'There are errors in the form.');

      return redirect('features/create');

    } else {

      App::get('database')->insert('features', [
        'title' => clean($title),
        'description' => clean($description)
      ]);

      Flash::message('success', 'Feature successfully created.');

      return redirect('admin-features');
    }
  }

  /**
   * Show a form to edit a given feature
   * GET /features/{id}/edit
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
   * Update a given feature
   * @param $id
   * @throws \Exception
   */
  public function update($id)
  {

    $title = $_POST['title'];
    $description = $_POST['description'];

    $errors = $this->validate([
        'title' => $title,
        'description' => $description]
    );

    if (count($errors)) {

      $_SESSION['errors'] = $errors;

      Flash::message('alert', 'There are errors in the form.');

      return redirect("features/{$id}/edit");

    } else {

      App::get('database')
        ->update('features', [
          'title' => clean($_POST['title']),
          'description' => clean($_POST['description'])
        ], $id);

      Flash::message('success', 'Feature successfully updated.');

      return redirect('admin-features');

    }
  }

  /**
   * Delete a given feature
   * DELETE /features/{id}
   * @param $id
   * @throws \Exception
   */
  public function destroy($id)
  {
    App::get('database')->delete('features', $id);

    Flash::message('success', 'Feature successfully deleted.');

    return redirect('admin-features');
  }

  /**
   * Set the feature as published in the database
   * @param $id
   * @throws \Exception
   */
  public function publish($id)
  {

    App::get('database')->publish('features', $id);

    Flash::message('success', 'Feature successfully published.');

    return redirect('admin-features');

  }

  /**
   * Set the feature as unpublished in the database
   * @param $id
   * @throws \Exception
   */
  public function unpublish($id)
  {

    App::get('database')->unpublish('features', $id);

    Flash::message('success', 'Feature successfully unpublished.');

    return redirect('admin-features');

  }

}
