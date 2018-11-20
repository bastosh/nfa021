<?php

namespace Mvc\App\Controllers;

use Mvc\Core\App;

class AdminController
{
  public function dashboard()
  {
    $title = 'Administration';
    $features = App::get('database')->selectAll('features');
    return view('admin.dashboard', compact('title', 'features'));
  }
}