<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title><?php echo $title; ?></title>
  <link rel="stylesheet" href="/css/app.css">
</head>
<body>
<div class="grid-y align-center align-middle" style="height: 100vh">
  <h1 class="margin-bottom-2">LOGIN</h1>
  <form action="/admin" method="POST">
    <label>
      Username
      <input type="text" name="username">
    </label>
    <label>
      Password
      <input type="password" name="password">
    </label>
    <button type="submit" class="button expanded">Connexion</button>
  </form>
</div>
</body>
</html>



