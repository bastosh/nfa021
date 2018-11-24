<?php require __DIR__.'/../admin/partials/head.php'; ?>

  <!-- CONTENT -->
  <div class="app-dashboard-body-content off-canvas-content" data-off-canvas-content>

    <h2 class="text-center">Edit <?= $feature->title; ?></h2>
    <hr>

    <div class="grid-x margin-top-2">
      <div class="cell small-8 small-offset-2 medium-6 medium-offset-3">
        <form action="/features/<?= $feature->id; ?>" method="POST">
          <input type="hidden" name="_method" value="PUT">
          <label>Title
            <input name="title" type="text" placeholder="Title of the feature" value="<?= $feature->title; ?>">
          </label>
          <label>Description
            <textarea name="description" placeholder="Description of the feature" rows="3" ><?= $feature->description; ?></textarea>
          </label>
          <input type="submit" class="button" value="Submit">
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


