<?php


class AdminController
{
  public function dashboard()
  {
    $title = 'Administration';
    return view('admin.dashboard', compact('title'));
  }
}