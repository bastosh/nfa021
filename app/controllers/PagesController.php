<?php

namespace Simple\App\Controllers;

class PagesController
{
  /**
   * Show the homepage
   * @return mixed
   */
  public function home()
  {
    $title = 'Homepage';
    return view('pages.home', compact('title'));
  }

  /**
   * Show the about page
   * @return mixed
   */
  public function about()
  {
    $title = 'About';
    return view('pages.about', compact('title'));
  }

  /**
   * Show the contact page
   * @return mixed
   */
  public function contact()
  {
    $title = 'Contact';
    return view('pages.contact', compact('title'));
  }

  /**
   * Show the 404 page
   * @return mixed
   */
  public function error()
  {
    $title = 'Page not found';
    return view('pages.error', compact('title'));
  }
}
