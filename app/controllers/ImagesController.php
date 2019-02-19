<?php

namespace Simple\App\Controllers;

use Simple\Core\App;
use Simple\Core\Flash;
use Simple\App\Models\Image;

class ImagesController extends Controller
{
  /**
   * Show all the images
   * GET /images
   * @return mixed
   * @throws \Exception
   */
  public function index()
  {

    $images = App::get('database')->selectAllPublished('images', Image::class);
    $page = 'Images';

    return $this->render('images.index', compact('page', 'images'));
  }

  /**
   * Show a given image
   * GET /images/{id}
   * @param $id
   * @return mixed
   * @throws \Exception
   */
  public function show($id)
  {
    $image = App::get('database')->select('images', $id, Image::class);
    if ($image) {
      $page = $image->title;
      return $this->render('images.show', compact('page', 'image'));
    }

    return view('pages.error');
  }

  /**
   * Show the form to create a image
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
      // Allow the user to create a new image
      $page = 'New Image';
      return view('images.create', compact('page'));
    }
    else {
      // Ask for credentials
      $page = 'Connexion';
      return view('admin.login', compact('page'));
    }
  }

  /**
   * Store a image into the database
   * POST /images
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
    $page = 'Nouvelle spécialité';

    $errors = $this->validateImage(['title' => $title]);

    if (count($errors)) {

      $_SESSION['errors'] = $errors;

      Flash::message('alert', 'Le formulaire comporte des erreurs.');

      return view('images.create', compact('title','page'));

    } else {

      App::get('database')->insert('images', ['title' => clean($title)]);

      Flash::message('success', 'L’image a été ajoutée.');

      return redirect('admin-images');
    }
  }

  /**
   * Show a form to edit a given image
   * GET /images/{id}/edit
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
      // Allow the user to edit the image
      $image = App::get('database')->select('images', $id, Image::class);
      $page = 'Edit';
      return view('images.edit', compact('page', 'image'));
    }
    else {
      // Ask for credentials
      $page = 'Connexion';
      return view('admin.login', compact('page'));
    }
  }

  /**
   * Update a given image
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

    $errors = $this->validateImage([
        'title' => $title
      ]
    );

    if (count($errors)) {

      $_SESSION['errors'] = $errors;

      Flash::message('alert', 'Le formulaire comporte des erreurs.');

      return redirect("images/{$id}/edit");

    } else {

      App::get('database')
        ->update('images', ['title' => clean($_POST['title'])
        ], $id);

      Flash::message('success', 'L’image a été mise à jour.');

      return redirect('admin-images');

    }
  }

  /**
   * Delete a given image
   * DELETE /images/{id}
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

    App::get('database')->delete('images', $id);

    Flash::message('success', 'L’image a été supprimée.');

    return redirect('admin-images');
  }

  /**
   * Set the image as published in the database
   * @param $id
   * @throws \Exception
   */
  public function publish($id)
  {

    App::get('database')->publish('images', $id);

    Flash::message('success', 'L’image a été publiée.');

    return redirect('admin-images');

  }

  /**
   * Set the image as unpublished in the database
   * @param $id
   * @throws \Exception
   */
  public function unpublish($id)
  {

    App::get('database')->unpublish('images', $id);

    Flash::message('success', 'L’image n’est plus publiée.');

    return redirect('admin-images');

  }

}
