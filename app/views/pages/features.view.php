<?php require __DIR__.'/../partials/head.php'; ?>
  <h1 class="margin-bottom-2">Features</h1>
  <div class="grid-x">
    <div class="cell small-8 small-offset-2 medium-4 medium-offset-4">
      <?php foreach ($features as $feature) : ?>
        <p class="callout"><?= $feature->title; ?></p>
      <?php endforeach; ?>
    </div>
  </div>
<?php require __DIR__.'/../partials/footer.php'; ?>
