<?php

require '../core/bootstrap.php';

switch($_SERVER['REQUEST_URI'])
{
  case '/'        : home();      break;
  case '/about'   : about();     break;
  case '/contact' : contact();   break;
  case '/features' : features();   break;
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

function features()
{
  $pdo = Connection::make();
  $query = new QueryBuilder($pdo);
  $features = $query->selectAll('features');
  $title = 'Features';
  return view('pages.features', compact('title', 'features'));
}
