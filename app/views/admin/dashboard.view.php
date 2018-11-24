<!DOCTYPE html>
  <html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="/css/admin.css">
  </head>
  <body class="grid-container">

      <nav class="cell shrink grid-x align-justify">
        <?php require __DIR__ . '/../partials/nav.php'; ?>
      </nav>

      <h1 class="text-center padding-vertical-1">Administration</h1>

      <?php require __DIR__ . '/../partials/message.php'; ?>

      <div class="grid-x grid-margin-x grid-padding-x">
        <div class="cell large-6">
          <h2>Features</h2>
          <table class="text-center">
            <thead>
            <tr>
              <th class="text-center">id</th>
              <th class="text-center">Title</th>
              <th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($features as $feature) : ?>
              <tr>
                <td><?= $feature->id; ?></td>
                <td><?= $feature->title; ?></td>
                <td>
                  <a class="button m  margin-bottom-0" href="/features/<?= $feature->id; ?>">Show</a>
                  <a class="button warning margin-bottom-0" href="/features/<?= $feature->id; ?>/edit">Edit</a>
                  <button data-open="deleteModal" class="button alert margin-bottom-0">Delete</button>
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

      <div class="reveal" id="deleteModal" data-reveal>
        <p>The item will be permanently deleted.</p>
        <form class="padding-vertical-1 text-center" action="/features/<?= $feature->id; ?>" method="POST">
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="button alert margin-bottom-0">Don’t worry, I am 100% sure.</button>
        </form>
        <button class="close-button" data-close aria-label="Close modal" type="button">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <?php require __DIR__.'/../partials/scripts.php'; ?>
  </body>
</html>
