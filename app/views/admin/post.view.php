<?php require __DIR__.'/../admin/partials/head.php'; ?>

  <!-- CONTENT -->
  <div class="app-dashboard-body-content off-canvas-content" data-off-canvas-content>

    <a href="/admin-posts"><i class="fas fa-long-arrow-alt-left"></i> Back</a>

    <h2 class="text-center"><?= $post->title; ?></h2>
    <hr>

    <div class="grid-x align-center margin-top-2">
      <div class="small-10 medium-6">
        <?php if($post->cover) : ?>
          <img class="margin-bottom-1" src="/img/<?= $post->cover; ?>" alt="">
        <?php endif; ?>
        <div><?= $post->content; ?></div>
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
