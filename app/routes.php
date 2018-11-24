<?php

// Routes for the static pages
$router->get('', 'PagesController@home');
$router->get('about', 'PagesController@about');
$router->get('contact', 'PagesController@contact');

// Routes for the resource Feature
$router->get('features', 'FeaturesController@index');
$router->get('features/{id}', 'FeaturesController@show');
$router->post('features', 'FeaturesController@store');
$router->get('features/{id}/edit', 'FeaturesController@edit');
$router->put('features/{id}', 'FeaturesController@update');
$router->delete('features/{id}', 'FeaturesController@destroy');

// Routes for the administration
$router->get('admin', 'AdminController@dashboard');
$router->post('admin', 'AdminController@dashboard');
$router->get('logout', 'AdminController@logout');
$router->get('admin-features/{id}', 'AdminController@showFeature');