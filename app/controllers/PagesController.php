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
    $guides = App::get('database')->selectLastPublished('guides', Guide::class, 3);
    $features = App::get('database')->selectAllPublished('features', Feature::class);
    $page = 'Accueil';
    return $this->render('pages.home', compact('page', 'guides', 'features'));
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

  public function gallery()
  {
    $page = 'Gallerie';
    $images = App::get('database')->selectAllPublished('images', Image::class);
    return $this->render('pages.gallery', compact('page', 'images'));
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
