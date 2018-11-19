<?php

$router->get('', 'PagesController@home');
$router->get('about', 'PagesController@about');
$router->get('contact', 'PagesController@contact');

$router->get('features', 'FeaturesController@index');
$router->post('features', 'FeaturesController@store');

$router->get('admin', 'AdminController@dashboard');
