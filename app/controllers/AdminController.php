<?php

namespace Simple\App\Controllers;

use Simple\Core\App;

class AdminController
{
  /**
   * Access to the dashboard if already logged or if the credentials are correct
   *
   * @return mixed
   * @throws \Exception
   */
  public function dashboard()
  {

    // Check if the user is already logged in and the credentials are correct
    if ((isset($_SESSION['username']) && isset($_SESSION['password']))
      && ($_SESSION['username'] === App::get('config')['admin']['username'])
      && (($_SESSION['password'] === App::get('config')['admin']['password'])))
    {

      $title = 'Administration';
      $features = App::get('database')->selectAll('features');
      $posts = App::get('database')->selectAll('posts');

      return view('admin.dashboard', compact('title', 'features', 'posts'));

    }

    // If not ask for credentials
    elseif (
      !isset($_POST['username'])
      OR $_POST['username'] != App::get('config')['admin']['username']
      OR !isset($_POST['password'])
      OR $_POST['password'] != App::get('config')['admin']['password']
    )
    {

      $title = 'Login';
      return view('admin.login', compact('title'));

      // Log the user if the credentials are correct
    } else {

      $_SESSION['username'] = $_POST['username'];
      $_SESSION['password'] = $_POST['password'];

      $title = 'Administration';
      $features = App::get('database')->selectAll('features');
      $posts = App::get('database')->selectAll('posts');

      return view('admin.dashboard', compact('title', 'features', 'posts'));

    }

  }

  /**
   * Log out the current user
   */
  public function logout()
  {
    session_unset();
    session_destroy();

    return redirect('');
  }

  /**
   * Admin page for the features
   * @return mixed
   * @throws \Exception
   */
  public function features()
  {

    // Check if the user is already logged in and the credentials are correct
    if ((isset($_SESSION['username']) && isset($_SESSION['password']))
      && ($_SESSION['username'] === App::get('config')['admin']['username'])
      && (($_SESSION['password'] === App::get('config')['admin']['password'])))
    {

      $title = 'Admin Features';
      $features = App::get('database')->selectAll('features');

      return view('admin.features', compact('title', 'features'));

    }

    // If not ask for credentials
    else {
      $title = 'Login';
      return view('admin.login', compact('title'));
    }
  }

  /**
   * Show details of a given feature in the administration
   * GET admin-features/{id}
   * @param $id
   * @return mixed
   * @throws \Exception
   */
  public function showFeature($id)
  {
    // Check if the user is already logged in and the credentials are correct
    if ((isset($_SESSION['username']) && isset($_SESSION['password']))
      && ($_SESSION['username'] === App::get('config')['admin']['username'])
      && (($_SESSION['password'] === App::get('config')['admin']['password']))) {

      $feature = App::get('database')->select('features', $id);
      if ($feature) {
        $title = 'Show feature';
        return view('admin.feature', compact('title', 'feature'));
      }

      return view('pages.error');

    } // If not ask for credentials
    else {
      $title = 'Connexion';
      return view('admin.login', compact('title'));
    }

  }

  /**
   * Admin page for the posts
   * @return mixed
   * @throws \Exception
   */
  public function posts()
  {

    // Check if the user is already logged in and the credentials are correct
    if ((isset($_SESSION['username']) && isset($_SESSION['password']))
      && ($_SESSION['username'] === App::get('config')['admin']['username'])
      && (($_SESSION['password'] === App::get('config')['admin']['password'])))
    {

      $title = 'Admin Posts';
      $posts = App::get('database')->selectAll('posts');

      return view('admin.posts', compact('title', 'posts'));

    }

    // If not ask for credentials
    else {
      $title = 'Login';
      return view('admin.login', compact('title'));
    }
  }

  /**
   * Show details of a given post in the administration
   * GET admin-posts/{id}
   * @param $id
   * @return mixed
   * @throws \Exception
   */
  public function showPost($id)
  {
    // Check if the user is already logged in and the credentials are correct
    if ((isset($_SESSION['username']) && isset($_SESSION['password']))
      && ($_SESSION['username'] === App::get('config')['admin']['username'])
      && (($_SESSION['password'] === App::get('config')['admin']['password']))) {

      $post = App::get('database')->select('posts', $id);
      if ($post) {
        $title = 'Show post';
        return view('admin.post', compact('title', 'post'));
      }

      return view('pages.error');

    } // If not ask for credentials
    else {
      $title = 'Connexion';
      return view('admin.login', compact('title'));
    }

  }
}