<?php require __DIR__.'/../admin/partials/head.php'; ?>

  <!-- CONTENT -->
  <div class="app-dashboard-body-content off-canvas-content" data-off-canvas-content>

    <a href="/admin-posts"><i class="fas fa-long-arrow-alt-left"></i> Posts</a>

    <h2 class="text-center">Edit «&thinsp;<?= $post->title; ?>&thinsp;»</h2>
    <hr>

    <?php require __DIR__ . '/../partials/message.php'; ?>

    <?php require __DIR__ . '/../partials/errors.php'; ?>

    <div class="grid-x margin-top-2">
      <div class="cell small-8 small-offset-2 medium-6 medium-offset-3">
        <form action="/posts/<?= $post->id; ?>" method="POST" data-abide novalidate>

          <div data-abide-error class="callout alert-callout-border alert" style="display: none;">
            <p><i class="fi-alert"></i> There are some errors in your form.</p>
          </div>

          <input type="hidden" name="_method" value="PUT">
          <label>Title
            <input name="title" type="text" placeholder="Title of the post" value="<?= $post->title; ?>" required pattern="^.{3,50}$">
            <span class="form-error">
              Title is required and must contain between 3 and 50 characters.
            </span>
          </label>
          <p class="help-text">Required. Between 3 and 50 characters.</p>
          <label>Description
            <textarea name="content" placeholder="Content of the post" rows="3" required><?= $post->content; ?></textarea>
            <span class="form-error">
              Content is required.
            </span>
          </label>
          <p class="help-text">Required.</p>
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


