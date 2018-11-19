<!DOCTYPE html>
  <html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body class="grid-container">
      <h1 class="text-center padding-vertical-3">Administration</h1>
      <div class="cell medium-6 medium-offset-3">
        <h2>Add a feature</h2>
        <form action="/features" method="POST">
          <label>Title
            <input name="title" type="text" placeholder="Title of the feature">
          </label>
          <label>Description
            <textarea name="description" placeholder="Description of the feature" rows="3"></textarea>
          </label>
          <input type="submit" class="button" value="Submit">
        </form>
      </div>
  </body>
</html>
