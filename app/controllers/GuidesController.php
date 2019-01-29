<?php

namespace Simple\App\Controllers;

use Simple\Core\App;
use Simple\Core\Flash;
use Simple\App\Models\Guide;

class GuidesController extends Controller
{
  /**
   * Show all the guides
   * GET /guides
   * @return mixed
   * @throws \Exception
   */
  public function index()
  {
    $guides = App::get('database')->selectAllPublished('guides', Guide::class);
    $page = 'Guides';

    return $this->render('guides.index', compact('page', 'guides'));
  }

  /**
   * Show a given guide
   * GET /guides/{id}
   * @param $id
   * @return mixed
   * @throws \Exception
   */
  public function show($id)
  {
    $guide = App::get('database')->select('guides', $id, Guide::class);
    if ($guide) {
      $page = $guide->title;
      return $this->render('guides.show', compact('page', 'guide'));
    }

    return view('pages.error');
  }

  /**
   * Show the form to create a guide
   * @return mixed
   * @throws \Exception
   */
  public function create()
  {
    // If the user is logged in
    if ((isset($_SESSION['username']) && isset($_SESSION['password']))
          && ($_SESSION['username'] === App::get('config')['admin']['username'])
          && (($_SESSION['password'] === App::get('config')['admin']['password'])))
    {
      // Allow the user to create a new guide
      $page = 'New Guide';
      return view('guides.create', compact('page'));
    }
    else {
      // Ask for credentials
      $page = 'Connexion';
      return view('admin.login', compact('page'));
    }
  }

  /**
   * Store a guide into the database
   * POST /guides
   * @throws \Exception
   */
  public function store()
  {

    if(!isset($_POST['token'])){
      throw new \Exception('No token found!');
    }

    if(hash_equals($_POST['token'], $_SESSION['token']) === false){
      throw new \Exception('Token mismatch!');
    }

    $title = $_POST['title'];
    $description = $_POST['description'];
    $page = 'New guide';

    $errors = $this->validate([
      'title' => $title,
      'description' => $description]
    );

    if (count($errors)) {

      $_SESSION['errors'] = $errors;

      Flash::message('alert', 'Le formulaire comporte des erreurs.');

      return view('guides.create', compact('title', 'description', 'page'));

    } else {

      App::get('database')->insert('guides', [
        'title' => clean($title),
        'description' => $description
      ]);

      Flash::message('success', 'La fiche a été publiée.');

      return redirect('admin-guides');
    }
  }

  /**
   * Show a form to edit a given guide
   * GET /guides/{id}/edit
   * @param $id
   * @return mixed
   * @throws \Exception
   */
  public function edit($id)
  {
    // If the user is logged in
    if ((isset($_SESSION['username']) && isset($_SESSION['password']))
          && ($_SESSION['username'] === App::get('config')['admin']['username'])
          && (($_SESSION['password'] === App::get('config')['admin']['password'])))
    {
      // Allow the user to edit the guide
      $guide = App::get('database')->select('guides', $id, Guide::class);
      $page = 'Edit';
      return view('guides.edit', compact('page', 'guide'));
    }
    else {
      // Ask for credentials
      $page = 'Connexion';
      return view('admin.login', compact('page'));
    }
  }

  /**
   * Update a given guide
   * @param $id
   * @throws \Exception
   */
  public function update($id)
  {

    if(!isset($_POST['token'])){
      throw new \Exception('No token found!');
    }

    if(hash_equals($_POST['token'], $_SESSION['token']) === false){
      throw new \Exception('Token mismatch!');
    }

    $title = $_POST['title'];
    $description = $_POST['description'];

    $errors = $this->validate([
        'title' => $title,
        'description' => $description]
    );

    if (count($errors)) {

      $_SESSION['errors'] = $errors;

      Flash::message('alert', 'Le formulaire comporte des erreurs.');

      return redirect("guides/{$id}/edit");

    } else {

      App::get('database')
        ->update('guides', [
          'title' => clean($_POST['title']),
          'description' => $_POST['description']
        ], $id);

      Flash::message('success', 'La fiche a été mise à jour.');

      return redirect('admin-guides');

    }
  }

  /**
   * Delete a given guide
   * DELETE /guides/{id}
   * @param $id
   * @throws \Exception
   */
  public function destroy($id)
  {

    if(!isset($_POST['token'])){
      throw new \Exception('No token found!');
    }

    if(hash_equals($_POST['token'], $_SESSION['token']) === false){
      throw new \Exception('Token mismatch!');
    }

    App::get('database')->delete('guides', $id);

    Flash::message('success', 'La fiche a été supprimée.');

    return redirect('admin-guides');
  }

  /**
   * Set the guide as published in the database
   * @param $id
   * @throws \Exception
   */
  public function publish($id)
  {

    App::get('database')->publish('guides', $id);

    Flash::message('success', 'La fiche a été publiée.');

    return redirect('admin-guides');

  }

  /**
   * Set the guide as unpublished in the database
   * @param $id
   * @throws \Exception
   */
  public function unpublish($id)
  {

    App::get('database')->unpublish('guides', $id);

    Flash::message('success', 'La fiche n’est plus en ligne.');

    return redirect('admin-guides');

  }

}
