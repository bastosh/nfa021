<?php

require '../vendor/autoload.php';

switch($_SERVER['REQUEST_URI'])
{
  case '/'        : home();      break;
  case '/about'   : about();     break;
  case '/contact' : contact();   break;
  default : home();
}

function home()
{
  $title = 'Homepage';
  return view('pages.home', compact('title'));
}

function about()
{
  $title = 'About';
  return view('pages.about', compact('title'));
}

function contact()
{
  $title = 'Contact';
  return view('pages.contact', compact('title'));
}
