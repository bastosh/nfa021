<?php require __DIR__.'/../partials/head.php'; ?>
  <?php foreach ($features as $feature) : ?>
    <p class="callout"><?= $feature->title; ?></p>
  <?php endforeach; ?>
<?php require __DIR__.'/../partials/footer.php'; ?>
