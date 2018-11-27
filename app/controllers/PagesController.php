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
    $page = 'Homepage';
    return view('pages.home', compact('page'));
  }

  /**
   * Show the about page
   * @return mixed
   */
  public function about()
  {
    $page = 'About';
    return view('pages.about', compact('page'));
  }

  /**
   * Show the contact page
   * @return mixed
   */
  public function contact()
  {
    $page = 'Contact';
    return view('pages.contact', compact('page'));
  }

  /**
   * Show the 404 page
   * @return mixed
   */
  public function error()
  {
    $page = 'Page not found';
    return view('pages.error', compact('page'));
  }
}
