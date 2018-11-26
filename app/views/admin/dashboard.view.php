<?php require 'partials/head.php'; ?>

      <!-- CONTENT -->
      <div class="app-dashboard-body-content off-canvas-content" data-off-canvas-content>
        <h2 class="text-center">Features</h2>
        <hr>

        <?php require __DIR__ . '/../partials/message.php'; ?>

        <div class="grid-x grid-margin-x grid-padding-x margin-top-2">
          <div class="cell xlarge-6">
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
                    <a class="button margin-bottom-0" href="/admin-features/<?= $feature->id; ?>">Show</a>
                    <a class="button warning margin-bottom-0" href="/features/<?= $feature->id; ?>/edit">Edit</a>
                    <button data-open="deleteModal" class="button alert margin-bottom-0">Delete</button>
                  </td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <div class="cell xlarge-6">
            <h3>New feature</h3>
            <?php if (isset($_SESSION['errors'])) : ?>
              <?php $errors = $_SESSION['errors']; unset($_SESSION['errors']);
              foreach ($errors as $error) : ?>
                <div class="callout alert-callout-border alert">
                  <?= $error; ?>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
            <form action="/features" method="POST" data-abide novalidate>
              <div data-abide-error class="callout alert-callout-border alert" style="display: none;">
                <p><i class="fi-alert"></i> There are some errors in your form.</p>
              </div>
              <label>Title&thinsp;*
                <input name="title" type="text" placeholder="Title of the feature" required pattern="^.{3,50}$">
                <span class="form-error">
                  Title is required and must contain between 3 and 50 characters.
                </span>
              </label>
              <p class="help-text">Required. Between 3 and 50 characters.</p>
              <label>Description&thinsp;*
                <textarea name="description" placeholder="Description of the feature" rows="3" pattern="^.{3,255}$"></textarea>
                <span class="form-error">
                  Description is required and must contain between 3 and 255 characters.
                </span>
              </label>
              <p class="help-text">Required. Between 3 and 255 characters.</p>
              <input type="submit" class="button" value="Add a feature">
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
      </div>
    </div>
  </div>

  <?php require __DIR__.'/../partials/scripts.php'; ?>
  <script>
      $('[data-app-dashboard-toggle-shrink]').on('click', function(e) {
          e.preventDefault();
          $(this).parents('.app-dashboard').toggleClass('shrink-medium').toggleClass('shrink-large');
      });
  </script>
</body>
</html>


