<?php

$query->insert('features', [
  'title' => $_POST['title'],
  'description' => $_POST['description']
]);

header('Location: /features');