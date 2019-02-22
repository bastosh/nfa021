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


function resize($sm, $md, $lg) {

	$target_dir = "../public/img/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);
	$uploadOk = 1;
	$errors = [];
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	// Check if image file is a actual image or fake image
	if(!getimagesize($_FILES["image"]["tmp_name"])) {
		$errors[] = "Hum... le fichier ne semble pas être une image.";
		$uploadOk = 0;
	}

	// Check if file already exists
	if (file_exists($target_file)) {
		$errors[] = "Désolé, une image avec ce nom-là existe déjà.";
		$uploadOk = 0;
	}

	// Check input file size
	if ($_FILES["image"]["size"] > 1000000) {
		$errors[] = "L’image est trop grosse: 1mo maximum.";
		$uploadOk = 0;
	}

	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
		$errors[] = "Seuls les formats JPG, JPEG, & PNG sont acceptés.";
		$uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by any error
	if ($uploadOk) {
		$image_mobile = new \Gumlet\ImageResize($_FILES["image"]["tmp_name"]);
		$image_mobile->resizeToWidth($sm);
		$image_mobile->save($target_dir .'sm-'. basename($_FILES["image"]["name"]));
		$image = new \Gumlet\ImageResize($_FILES["image"]["tmp_name"]);
		$image->resizeToWidth($md);
		$image->save($target_file);
		$image_retina = new \Gumlet\ImageResize($_FILES["image"]["tmp_name"]);
		$image_retina->resizeToWidth($lg);
		$image_retina->save($target_dir .'lg-'. basename($_FILES["image"]["name"]));
	}

	return $errors;

}

function slugify($string) {
		$slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
		return strtolower($slug);
}
