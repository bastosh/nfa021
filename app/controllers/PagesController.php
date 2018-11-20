<?php

namespace Mvc\App\Controllers;

class PagesController
{
  public function home()
  {
    $title = 'Homepage';
    return view('pages.home', compact('title'));
  }

  public function about()
  {
    $title = 'About';
    return view('pages.about', compact('title'));
  }

  public function contact()
  {
    $title = 'Contact';
    return view('pages.contact', compact('title'));
  }
}