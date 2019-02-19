<?php require __DIR__.'/../admin/partials/head.php'; ?>

  <!-- CONTENT -->
  <div class="app-dashboard-body-content off-canvas-content" data-off-canvas-content>

    <a href="/admin-guides"><i class="fas fa-long-arrow-alt-left"></i> Retour</a>

    <h2 class="text-center"><?= $guide->title; ?></h2>
    <hr>

    <div class="grid-x align-center margin-top-2">
      <div class="small-10  medium-6">
        <?php if($guide->image_name) : ?>
              <picture>
                <source media="(min-width: 768px)"
                        srcset="/img/<?= $guide->image_name; ?> 1x,
                              /img/lg-<?= $guide->image_name; ?> 2x">
                <img src="/img/sm-<?= $guide->image_name; ?>"
                     srcset="/img/<?= $guide->image_name; ?> 2x"
                     alt="<?= $guide->text_alt; ?>" style="width: 100%">
              </picture>
        <?php endif; ?>
        <p class="text-center lead"><?= $guide->description; ?></p>
      </div>
    </div>

  </div>
  <!-- END CONTENT -->

<?php require __DIR__.'/../admin/partials/footer.php'; ?>
