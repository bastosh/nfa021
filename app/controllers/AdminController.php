<?php

namespace Mvc\App\Controllers;

class AdminController
{
  public function dashboard()
  {
    $title = 'Administration';
    return view('admin.dashboard', compact('title'));
  }
}