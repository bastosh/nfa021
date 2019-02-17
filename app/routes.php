<?php

// Routes for the static pages
$router->get('', 'PagesController@home');
$router->get('notre-clinique', 'PagesController@about');
$router->get('notre-equipe', 'PagesController@team');
$router->get('nous-contacter', 'PagesController@contact');

// Routes for the resource Guide
$router->get('fiches-conseils', 'GuidesController@index');
$router->get('fiches-conseils/{id}', 'GuidesController@show');
$router->get('guides/create', 'GuidesController@create');
$router->post('guides', 'GuidesController@store');
$router->get('guides/{id}/edit', 'GuidesController@edit');
$router->put('guides/{id}', 'GuidesController@update');
$router->delete('guides/{id}', 'GuidesController@destroy');
$router->put('guides/{id}/image', 'GuidesController@deleteImage');
$router->put('guides/{id}/publish', 'GuidesController@publish');
$router->put('guides/{id}/unpublish', 'GuidesController@unpublish');

// Routes for the resource Feature
$router->get('features', 'FeaturesController@index');
$router->get('features/create', 'FeaturesController@create');
$router->get('features/{id}', 'FeaturesController@show');
$router->post('features', 'FeaturesController@store');
$router->get('features/{id}/edit', 'FeaturesController@edit');
$router->put('features/{id}', 'FeaturesController@update');
$router->delete('features/{id}', 'FeaturesController@destroy');
$router->put('features/{id}/publish', 'FeaturesController@publish');
$router->put('features/{id}/unpublish', 'FeaturesController@unpublish');

// Routes for the administration
$router->get('admin', 'AdminController@dashboard');
$router->post('admin', 'AdminController@dashboard');
$router->get('logout', 'AdminController@logout');
$router->get('admin-guides', 'AdminController@guides');
$router->get('admin-guides/{id}', 'AdminController@showGuide');
$router->get('admin-features', 'AdminController@features');
$router->get('admin-features/{id}', 'AdminController@showFeature');
