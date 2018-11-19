<?php

$features = App::get('database')->selectAll('features', 'Feature');
$title = 'Features';
return view('pages.features', compact('title', 'features'));
