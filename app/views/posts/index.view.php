<?php require __DIR__.'/../partials/head.php'; ?>
  <h1 class="text-center margin-bottom-2">Articles</h1>
  <div class="grid-x">
    <div class="cell small-8 small-offset-2 medium-4 medium-offset-4">
      <?php if (count($posts) > 0) : ?>
        <?php foreach ($posts as $post) : ?>
          <a href="/posts/<?= $post->id; ?>">
            <p class="callout"><?= $post->title; ?></p>
          </a>
        <?php endforeach; ?>
      <?php else : ?>
        <p class="lead text-center">There are no articles to display.</p>
      <?php endif; ?>
    </div>
  </div>
<?php require __DIR__.'/../partials/footer.php'; ?>
