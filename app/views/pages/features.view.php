<?php require __DIR__.'/../partials/head.php'; ?>
  <h1 class="margin-bottom-2">Features</h1>
  <?php foreach ($features as $feature) : ?>
    <p class="callout"><?= $feature->title; ?></p>
  <?php endforeach; ?>
<?php require __DIR__.'/../partials/footer.php'; ?>
