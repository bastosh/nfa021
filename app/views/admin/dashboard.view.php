<!DOCTYPE html>
  <html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body class="grid-container">
      <h1 class="text-center padding-vertical-3">Administration</h1>
      <div class="grid-x grid-margin-x grid-padding-x">
        <div class="cell large-6">
          <h2>Features</h2>
          <table>
            <thead>
            <tr>
              <th>id</th>
              <th>Title</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($features as $feature) : ?>
              <tr>
                <td><?= $feature->id; ?></td>
                <td><?= $feature->title; ?></td>
                <td>
                  <a class="button" href="/features/<?= $feature->id; ?>">Show</a>
                  <a class="button warning" href="/features/<?= $feature->id; ?>/edit">Edit</a>
                  <form class="display-inline" action="/features/<?= $feature->id; ?>/delete" method="POST">
                    <button type="submit" class="button alert">Delete</button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <div class="cell large-6">
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
      </div>
  </body>
</html>
