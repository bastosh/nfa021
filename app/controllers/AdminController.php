<?php

namespace Simple\App\Controllers;

use Simple\Core\App;

class AdminController
{
  /**
   * Access to the dashboard if already logged
   * or if the credentials are correct
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
      $projects = App::get('database')->selectAll('projects');

      return view('admin.dashboard', compact('title', 'projects'));

    }

    // Show the form as long as the credentials are wrong
    elseif (
      !isset($_POST['username'])
      OR $_POST['username'] != App::get('config')['admin']['username']
      OR !isset($_POST['password'])
      OR $_POST['password'] != App::get('config')['admin']['password']
    )
    {

      $title = 'Connexion';
      return view('admin.login', compact('title'));

      // Log the user if the credentials are correct
    } else {

      $_SESSION['username'] = $_POST['username'];
      $_SESSION['password'] = $_POST['password'];

      $title = 'Administration';
      $projects = App::get('database')->selectAll('projects');

      return view('admin.dashboard', compact('title', 'projects'));

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

}
