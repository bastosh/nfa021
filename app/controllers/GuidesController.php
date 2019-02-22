<?php

namespace Simple\App\Controllers;

use Simple\Core\App;
use Simple\Core\Flash;

class GuidesController extends Controller
{

		/**
		 * @return mixed
		 * @throws \Exception
		 */
		public function index()
  {
    $guides = App::get('database')->selectAllPublishedGuides();
    $page = 'Guides';
    return $this->render('guides.index', compact('page', 'guides'));
  }

		/**
		 * @param $id
		 * @return mixed
		 * @throws \Exception
		 */
		public function show($id)
  {
    $guide = App::get('database')->selectGuide($id);
    return $this->render('guides.show', compact('page', 'guide'));
  }

		/**
		 * @return mixed
		 * @throws \Exception
		 */
		public function create()
  {
    // If the user is logged in
    if ((isset($_SESSION['username']) && isset($_SESSION['password']))
          && ($_SESSION['username'] === App::get('config')['admin']['username'])
          && (($_SESSION['password'] === App::get('config')['admin']['password'])))
    {
      // Allow the user to create a new guide
      $page = 'New Guide';
      return view('guides.create', compact('page'));
    }
    else {
      // Ask for credentials
      $page = 'Connexion';
      return view('admin.login', compact('page'));
    }
  }

		/**
		 * @return mixed
		 * @throws \Exception
		 */
		public function store()
  {

    if(!isset($_POST['token'])){
      throw new \Exception('No token found!');
    }

    if(hash_equals($_POST['token'], $_SESSION['token']) === false){
      throw new \Exception('Token mismatch!');
    }

    $title = $_POST['title'];
    $description = $_POST['description'];
    $page = 'Nouvelle fiche conseil';

		// Upload the image on the server if the file is OK
		// and there is an alternative text
		if ($_FILES['image']['size'] > 0) {

			$alt = $_POST['image_alt'];
			$errors = $this->validateImage([
				'image_alt' => $alt,
			]);

			if (count($errors)) {

					$_SESSION['errors'] = $errors;
					Flash::message('alert', 'Le formulaire comporte des erreurs.');
					return view('guides.create', compact('title', 'description', 'page'));

			} else {

					$uploadErrors = resize(250, 500, 1000);

					if (count($uploadErrors)) {

							$_SESSION['errors'] = $uploadErrors;
							Flash::message('alert', 'L’image n’a pas pu être envoyée sur le serveur.');
							return view('guides.create', compact('page', 'title', 'content'));

					} else {
								$imageUploaded = App::get('database')->insert('images', [
								'image_name' => $_FILES["image"]["name"],
								'text_alt' => $_POST['image_alt']
							]);
					}
			}
		}

		$errors = $this->validateGuide([
			'title' => $title,
		]);

    if (count($errors)) {

      $_SESSION['errors'] = $errors;

      Flash::message('alert', 'Le formulaire comporte des erreurs.');

      return view('guides.create', compact('title', 'description', 'page'));

    } else {

			$guide = App::get('database')->insert('guides', [
			'title' => clean($title),
			'description' => $description,
		]);

			if ($imageUploaded) {
					App::get('database')->updateImage($imageUploaded, $guide);
			}

	}

		Flash::message('success', 'La fiche a été publiée.');

		return redirect('admin-guides');

  }

		/**
		 * @param $id
		 * @return mixed
		 * @throws \Exception
		 */
		public function edit($id)
  {
    // If the user is logged in
    if ((isset($_SESSION['username']) && isset($_SESSION['password']))
          && ($_SESSION['username'] === App::get('config')['admin']['username'])
          && (($_SESSION['password'] === App::get('config')['admin']['password'])))
    {
      // Allow the user to edit the guide
			$guide = App::get('database')->selectGuide($id);
      $page = 'Edit';
      return view('guides.edit', compact('page', 'guide'));
    }
    else {
      // Ask for credentials
      $page = 'Connexion';
      return view('admin.login', compact('page'));
    }
  }

		/**
		 * @param $id
		 * @return mixed
		 * @throws \Exception
		 */
		public function update($id)
  {

			if(!isset($_POST['token'])){
					throw new \Exception('No token found!');
			}

			if(hash_equals($_POST['token'], $_SESSION['token']) === false){
					throw new \Exception('Token mismatch!');
			}

			$title = $_POST['title'];
			$description = $_POST['description'];
			$page = 'Modifier '.$_POST['title'];

			$errors = $this->validateGuide([
				'title' => $title,
			]);

			if (count($errors)) {

					$_SESSION['errors'] = $errors;

					Flash::message('alert', 'Le formulaire comporte des erreurs.');

					return view('guides.create', compact('title', 'description', 'page'));

			} else {

					App::get('database')->update('guides', [
						'title' => clean($title),
						'description' => $description,
					], $id);
			}

			$guide = App::get('database')->selectGuide($id);

			if (!$guide->image_name) {
					if ($_FILES['image']['size'] > 0) {

							$alt = $_POST['image_alt'];
							$errors = $this->validateImage([
								'image_alt' => $alt,
							]);

							if (count($errors)) {

									$_SESSION['errors'] = $errors;
									Flash::message('alert', 'Le formulaire comporte des erreurs.');
									return view('guides.create', compact('title', 'description', 'page'));

							} else {

									$uploadErrors = resize(250, 500, 1000);

									if (count($uploadErrors)) {

											$_SESSION['errors'] = $uploadErrors;
											Flash::message('alert', 'L’image n’a pas pu être envoyée sur le serveur.');
											return view('guides.create', compact('page', 'title', 'content'));
									} else {
											App::get('database')->insert('images', [
												'guide_id' => $guide->id,
												'image_name' => $_FILES["image"]["name"],
												'text_alt' => $_POST['image_alt']
											]);
									}
							}
					}
			}

			Flash::message('success', 'La fiche a été mise à jour.');

			return redirect('admin-guides');

    }

		/**
		 * @param $id
		 * @throws \Exception
		 */
		public function destroy($id)
  {

    if(!isset($_POST['token'])){
      throw new \Exception('No token found!');
    }

    if(hash_equals($_POST['token'], $_SESSION['token']) === false){
      throw new \Exception('Token mismatch!');
    }

    $guide = App::get('database')->selectGuide($id);
    if ($guide->image_name) {
    	$this->deleteImage($id);
		}

		App::get('database')->delete('guides', $id);

		Flash::message('success', 'La fiche a été supprimée.');

    return redirect('admin-guides');
  }

		/**
		 * @param $id
		 * @throws \Exception
		 */
		public function publish($id)
  {

    App::get('database')->publish('guides', $id);

    Flash::message('success', 'La fiche a été publiée.');

    return redirect('admin-guides');

  }

		/**
		 * @param $id
		 * @throws \Exception
		 */
		public function unpublish($id)
  {

    App::get('database')->unpublish('guides', $id);

    Flash::message('success', 'La fiche n’est plus en ligne.');

    return redirect('admin-guides');

  }

		/**
		 * @param $id
		 * @throws \Exception
		 */
		public function deleteImage($id)
	{

		$guide = App::get('database')->selectGuide($id);
		$image_id = $guide->image_id;

		// Remove the files from the public folder
		unlink('../public/img/sm-'.$guide->image_name);
		unlink('../public/img/'.$guide->image_name);
		unlink('../public/img/lg-'.$guide->image_name);

		// Remove the image from the database
		App::get('database')->deleteImage($image_id);

		Flash::message('success', 'L’image a été supprimée.');

		return redirect("guides/{$id}/edit");

	}

}
