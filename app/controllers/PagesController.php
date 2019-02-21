<?php

namespace Simple\App\Controllers;

use Simple\Core\App;
use Simple\App\Models\Guide;
use Simple\App\Models\Feature;
use Simple\App\Models\Image;

class PagesController extends Controller
{
  public function home()
  {
    $features = App::get('database')->selectAllPublished('features', Feature::class);
    $page = 'Accueil';
    return $this->render('pages.home', compact('page','features'));
  }

  public function about()
  {
    $page = 'Notre clinique';
    return $this->render('pages.about', compact('page'));
  }

  public function team()
  {
    $page = 'Notre équipe';
    return $this->render('pages.team', compact('page'));
  }

  public function contact()
  {
    $page = 'Contact';
    return $this->render('pages.contact', compact('page'));
  }

  /**
   * Show the 404 page
   * @return mixed
   */
  public function error()
  {
    return view('pages.error');
  }
}
