<?php require __DIR__.'/../partials/head.php'; ?>
  <h1 class="text-center margin-bottom-2">Articles</h1>
  <div class="grid-x align-center">
    <div class="small-10 medium-6">
      <?php if (count($posts) > 0) : ?>
        <?php foreach (array_reverse($posts) as $post) : ?>
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
