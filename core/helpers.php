<?php

/**
 *
 * Fonction permettant de charger une vue depuis le contrôleur
 * Prend en paramètre le chemin de la vue depuis le dossier views
 * sous la forme 'dossier.vue' (ex.: 'pages.home')
 * Accepte en second argument optionnel un tableau de variables
 * qui seront passées à la vue
 *
 * @param $name
 * @param array $data
 * @return mixed
 */
function view($name, $data = []) {
  extract($data);
  $parts = explode('.', $name);
  return require "../app/views/{$parts[0]}/{$parts[1]}.view.php";
}

/**
 * Helper function to redirect
 * to a given path
 *
 * @param $path
 */
function redirect($path) {
  header("Location: /{$path}");
}

/**
 * @param $data
 * @return string
 */
function clean($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function upload($img) {
  $target_dir = "../public/img/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  $uploadOk = 1;
  $errors = [];
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Check if image file is a actual image or fake image
  if(!getimagesize($_FILES["image"]["tmp_name"])) {
    $errors[] = "File is not an image.";
    $uploadOk = 0;
  }

  // Check if file already exists
  if (file_exists($target_file)) {
    $errors[] = "File already exists.";
    $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["image"]["size"] > 800000) {
    $errors[] = "File is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    $errors[] = "Only JPG, JPEG, & PNG files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk) {
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
  }

  return $errors;

}