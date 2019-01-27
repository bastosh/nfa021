<?php

// Routes for the static pages
$router->get('', 'PagesController@home');
$router->get('about', 'PagesController@about');
$router->get('contact', 'PagesController@contact');

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

// Routes for the docs
$router->get('docs', 'DocsController@installation');
$router->get('docs/installation', 'DocsController@installation');
$router->get('docs/basics', 'DocsController@basics');
$router->get('docs/architecture', 'DocsController@architecture');
$router->get('docs/views', 'DocsController@views');
$router->get('docs/database', 'DocsController@database');
$router->get('docs/security', 'DocsController@security');
$router->get('docs/assets', 'DocsController@assets');

// Routes for the administration
$router->get('admin', 'AdminController@dashboard');
$router->post('admin', 'AdminController@dashboard');
$router->get('logout', 'AdminController@logout');
$router->get('admin-features', 'AdminController@features');
$router->get('admin-features/{id}', 'AdminController@showFeature');
