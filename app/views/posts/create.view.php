<?php require __DIR__.'/../admin/partials/head.php'; ?>

  <!-- CONTENT -->
  <div class="app-dashboard-body-content off-canvas-content" data-off-canvas-content>

    <a href="/admin-posts"><i class="fas fa-long-arrow-alt-left"></i> Back</a>

    <h2 class="text-center">New Article</h2>
    <hr>

    <?php require __DIR__ . '/../partials/message.php'; ?>

    <?php if (isset($_SESSION['errors'])) : ?>
      <?php $errors = $_SESSION['errors']; unset($_SESSION['errors']);
      foreach ($errors as $error) : ?>
        <div class="callout alert-callout-border alert">
          <?= $error; ?>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>

    <div class="grid-x margin-top-2">
      <div class="cell small-8 small-offset-2 medium-6 medium-offset-3">
        <form action="/posts" method="POST" data-abide novalidate>
          <div data-abide-error class="callout alert-callout-border alert" style="display: none;">
            <p><i class="fi-alert"></i> There are some errors in your form.</p>
          </div>
          <label>Title&thinsp;*
            <input name="title" type="text" placeholder="Title of the post" required>
            <span class="form-error">
                    An article needs a (good) title.
                  </span>
          </label>
          <label>Description&thinsp;*
            <textarea name="content" placeholder="Content of the post" rows="3" required></textarea>
            <span class="form-error">
                    An article needs a (relevant) content.
                  </span>
          </label>
          <input type="submit" class="button" value="Publish">
        </form>
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


