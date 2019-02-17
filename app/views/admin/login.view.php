<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $page; ?></title>
  <link rel="stylesheet" href="/assets/css/app.css">
  <style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }

    main {
      flex: 1;
    }
  </style>
</head>

<body>

<main class="grid-y align-center">
  <h1 class="text-center margin-bottom-2">LOGIN</h1>
  <div class="grid-x align-center">
    <div class="small-8 medium-4">
      <form action="/admin" method="POST">
        <label>
          Username
          <input type="text" name="username">
        </label>
        <label>
          Password
          <input type="password" name="password">
        </label>
        <button type="submit" class="button primary expanded margin-top-2">Connexion</button>
      </form>
    </div>
  </div>
<?php require __DIR__.'/../partials/footer.php'; ?>



