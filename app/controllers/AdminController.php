<?php

namespace Mvc\App\Controllers;

use Mvc\Core\App;

class AdminController
{
  public function dashboard()
  {

    if (isset($_SESSION['username'])) {

      $title = 'Administration';
      $features = App::get('database')->selectAll('features');

      return view('admin.dashboard', compact('title', 'features'));

    }

    elseif (
      !isset($_POST['username'])
      OR $_POST['username'] != App::get('config')['security']['username']
      OR !isset($_POST['password'])
      OR $_POST['password'] != App::get('config')['security']['password']
    )
    {

      $title = 'Login';
      return view('admin.login', compact('title'));

    } else {

      $_SESSION['username'] = $_POST['username'];
      $_SESSION['password'] = $_POST['password'];

      $title = 'Administration';
      $features = App::get('database')->selectAll('features');

      return view('admin.dashboard', compact('title', 'features'));

    }

  }

  public function logout()
  {
    session_unset();
    session_destroy();

    return redirect('');
  }

}