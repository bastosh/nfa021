<?php require __DIR__.'/../admin/partials/head.php'; ?>

  <!-- CONTENT -->
  <div class="app-dashboard-body-content off-canvas-content" data-off-canvas-content>

    <a href="/admin-posts"><i class="fas fa-long-arrow-alt-left"></i> Back</a>

    <h2 class="text-center">New Article</h2>
    <hr>

    <?php require __DIR__ . '/../partials/message.php'; ?>

    <?php require __DIR__ . '/../partials/errors.php'; ?>

    <div class="grid-x margin-top-2 align-center">
      <div class="cell medium-10 large-8">
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

          <label>Content&thinsp;*
            <textarea name="content" id="editor" cols="30" rows="10"></textarea>
            <span class="form-error">
              An article needs a (relevant) content.
            </span>
          </label>

          <input type="submit" class="button margin-top-1" value="Publish">
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

    <script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace( 'editor' );
    </script>

</body>
</html>


