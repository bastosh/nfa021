<?php

namespace Mvc\App\Controllers;

use Mvc\Core\App;

class AdminController
{
  public function dashboard()
  {

    if (
      !isset($_POST['username'])
      OR $_POST['username'] != App::get('config')['security']['username']
      OR !isset($_POST['password'])
      OR $_POST['password'] != App::get('config')['security']['password']
    )
    {

      $title = 'Login';
      return view('admin.login', compact('title'));

    } else {

      $title = 'Administration';
      $features = App::get('database')->selectAll('features');

      return view('admin.dashboard', compact('title', 'features'));

    }

  }
}