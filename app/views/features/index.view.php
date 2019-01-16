<?php require __DIR__.'/../partials/head.php'; ?>
  <h1 class="text-center margin-bottom-2">Features</h1>
  <div class="grid-x align-center">
    <div class="small-8 medium-4">
      <?php if (count($features) > 0) : ?>
        <?php foreach ($features as $feature) : ?>
          <a href="/features/<?= $feature->id; ?>">
            <p class="callout"><?= $feature->title; ?></p>
          </a>
        <?php endforeach; ?>
      <?php else : ?>
        <p class="lead text-center">There are no features to display.</p>
      <?php endif; ?>
    </div>
  </div>
<?php require __DIR__.'/../partials/footer.php'; ?>
