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

    // Check if the user is already logged in
    if (isset($_SESSION['username'])) {

      $title = 'Administration';
      $features = App::get('database')->selectAll('features');

      return view('admin.dashboard', compact('title', 'features'));

    }

    // If not ask for credentials
    elseif (
      !isset($_POST['username'])
      OR $_POST['username'] != App::get('config')['security']['username']
      OR !isset($_POST['password'])
      OR $_POST['password'] != App::get('config')['security']['password']
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

      return view('admin.dashboard', compact('title', 'features'));

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