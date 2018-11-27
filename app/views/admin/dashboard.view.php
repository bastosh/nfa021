<<<<<<< HEAD
<!DOCTYPE html>
  <html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="/css/app.css">
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
                  <a class="button" href="/features/<?= $feature->id; ?>">Show</a>
                  <a class="button warning" href="/features/<?= $feature->id; ?>/edit">Edit</a>
                  <button data-open="deleteModal" class="button alert margin-bottom-0">Delete</button>
                </td>
=======
<?php require 'partials/head.php'; ?>

      <!-- CONTENT -->
      <div class="app-dashboard-body-content off-canvas-content" data-off-canvas-content>

        <?php require __DIR__ . '/../partials/message.php'; ?>

        <h2 class="text-center">Dashboard</h2>
        <hr>
        <div class="grid-x grid-margin-x grid-padding-x margin-top-2">
          <section class="cell medium-6">
            <h3>Features</h3>
            <table class="hover text-center dashboard">
              <thead>
              <tr>
                <th class="text-center">id</th>
                <th class="text-center">Title</th>
                <th class="text-center show-for-large">Status</th>
>>>>>>> 167796b0321234a9b267b0f3f5355d5fa2d712dc
              </tr>
              </thead>
              <tbody>
              <?php foreach ($features as $feature) : ?>
                <tr>
                  <td><?= $feature->id; ?></td>
                  <td><a href="/features/<?= $feature->id; ?>/edit"><?= $feature->title; ?></a></td>
                  <?php if ($feature->published === "1") :?>
                    <td class="show-for-large">Published</td>
                  <?php else: ?>
                    <td class="show-for-large">Unpublished</td>
                  <?php endif; ?>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </section>
          <section class="cell medium-6">
            <h3>Posts</h3>
            <table class="hover text-center dashboard">
              <thead>
              <tr>
                <th class="text-center">id</th>
                <th class="text-center">Title</th>
                <th class="text-center show-for-large">Status</th>
              </tr>
              </thead>
              <tbody>
              <?php foreach ($posts as $post) : ?>
                <tr>
                  <td><?= $post->id; ?></td>
                  <td><a href="/posts/<?= $post->id; ?>/edit"><?= $post->title; ?></a></td>
                  <?php if ($post->published === "1") :?>
                    <td class="show-for-large">Published</td>
                  <?php else: ?>
                    <td class="show-for-large">Unpublished</td>
                  <?php endif; ?>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </section>
        </div>

      </div>

<<<<<<< HEAD
      <div class="reveal" id="deleteModal" data-reveal>
        <p>La suppression est définitive</p>
        <form class="padding-vertical-1 text-center" action="/features/<?= $feature->id; ?>" method="POST">
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="button alert margin-bottom-0">Je suis sûr de vouloir supprimer cet item</button>
        </form>
        <button class="close-button" data-close aria-label="Close modal" type="button">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <?php require __DIR__.'/../partials/scripts.php'; ?>
  </body>
=======
  <?php require __DIR__.'/../partials/scripts.php'; ?>
  <script>
      $('[data-app-dashboard-toggle-shrink]').on('click', function(e) {
          e.preventDefault();
          $(this).parents('.app-dashboard').toggleClass('shrink-medium').toggleClass('shrink-large');
      });

      $(document).ready(function() {

          $('table tr').click(function() {
              let href = $(this).find("a").attr("href");
              if(href) {
                  window.location = href;
              }
          });

      });

  </script>
</body>
>>>>>>> 167796b0321234a9b267b0f3f5355d5fa2d712dc
</html>


