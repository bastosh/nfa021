<?php

$router->get('', '../app/controllers/home.php');
$router->get('about', '../app/controllers/about.php');
$router->get('contact', '../app/controllers/contact.php');
$router->get('features', '../app/controllers/features.php');
$router->get('admin', '../app/controllers/admin.php');

$router->post('features', '../app/controllers/add-feature.php');
