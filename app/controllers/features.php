<?php

$features = $query->selectAll('features', 'Feature');
$title = 'Features';
return view('pages.features', compact('title', 'features'));
