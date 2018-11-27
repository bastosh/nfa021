<?php require __DIR__.'/../partials/head.php'; ?>
  <nav class="align-self-middle margin-bottom-1" aria-label="You are here:" role="navigation">
    <ul class="breadcrumbs">
      <li><a href="/posts">posts</a></li>
      <li><a href="/posts/<?= $post->id; ?>"><?= $post->title; ?></a></li>
    </ul>
  </nav>
  <h1 class="text-center margin-bottom-2"><?= $post->title; ?></h1>
  <div class="grid-x">
    <div class="cell small-10 small-offset-1 medium-6 medium-offset-3">
      <p class="text-center lead"><?= $post->content; ?></p>
    </div>
  </div>
<?php require __DIR__.'/../partials/footer.php'; ?>