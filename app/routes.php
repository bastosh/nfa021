<?php

$router->get('', 'PagesController@home');
$router->get('about', 'PagesController@about');
$router->get('contact', 'PagesController@contact');

$router->get('features', 'FeaturesController@index');
$router->get('features/{id}', 'FeaturesController@show');
$router->post('features', 'FeaturesController@store');
$router->post('features/{id}/delete', 'FeaturesController@destroy');

$router->get('admin', 'AdminController@dashboard');
