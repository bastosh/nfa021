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

// Routes for the resource Post
$router->get('posts', 'PostsController@index');
$router->get('posts/create', 'PostsController@create');
$router->get('posts/{id}', 'PostsController@show');
$router->post('posts', 'PostsController@store');
$router->get('posts/{id}/edit', 'PostsController@edit');
$router->put('posts/{id}', 'PostsController@update');
$router->delete('posts/{id}', 'PostsController@destroy');
$router->put('posts/{id}/publish', 'PostsController@publish');
$router->put('posts/{id}/unpublish', 'PostsController@unpublish');

// Routes for the administration
$router->get('admin', 'AdminController@dashboard');
$router->post('admin', 'AdminController@dashboard');
$router->get('logout', 'AdminController@logout');
$router->get('admin-features', 'AdminController@features');
$router->get('admin-posts', 'AdminController@posts');
$router->get('admin-features/{id}', 'AdminController@showFeature');
$router->get('admin-posts/{id}', 'AdminController@showPost');