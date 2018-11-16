<?php

function view($name, $data = []) {
  extract($data);
  $parts = explode('.', $name);
  return require "../app/views/{$parts[0]}/{$parts[1]}.view.php";
}
