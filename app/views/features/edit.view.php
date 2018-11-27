<?php require __DIR__.'/../admin/partials/head.php'; ?>

  <!-- CONTENT -->
  <div class="app-dashboard-body-content off-canvas-content" data-off-canvas-content>

    <a href="/admin-features"><i class="fas fa-long-arrow-alt-left"></i> Features</a>

    <h2 class="text-center">Edit «&thinsp;<?= $feature->title; ?>&thinsp;»</h2>
    <hr>

    <?php require __DIR__ . '/../partials/message.php'; ?>

    <div class="grid-x align-center margin-top-2">
      <div class="small-8 medium-6">
        <?php require __DIR__ . '/../partials/errors.php'; ?>
        <form action="/features/<?= $feature->id; ?>" method="POST" novalidate>

          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">

          <div data-abide-error class="callout alert-callout-border alert" style="display: none;">
            <p><i class="fi-alert"></i> There are some errors in your form.</p>
          </div>

          <label>Title
            <input name="title" type="text" placeholder="Title of the feature" value="<?= $feature->title; ?>" required pattern="^.{3,50}$">
            <span class="form-error">
              Title is required and must contain between 3 and 50 characters.
            </span>
          </label>
          <p class="help-text">Required. Between 3 and 50 characters.</p>

          <label>Description
            <textarea name="description" placeholder="Description of the feature" rows="3" required pattern="^.{3,255}$"><?= $feature->description; ?></textarea>
            <span class="form-error">
              Description is required and must contain between 3 and 255 characters.
            </span>
          </label>
          <p class="help-text">Required. Between 3 and 255 characters.</p>

          <input type="submit" class="button" value="Update">

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


