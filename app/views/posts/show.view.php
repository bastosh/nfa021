<?php require __DIR__.'/../partials/head.php'; ?>

  <h1 class="text-center margin-bottom-1"><?= $post->title; ?></h1>
  <div class="grid-x align-center">
    <div class="small-10 medium-6">
      <?php if($post->cover) : ?>
       <img class="margin-bottom-1" src="/img/<?= $post->cover; ?>" alt="">
      <?php endif; ?>
      <div><?= $post->content; ?></div>
    </div>
  </div>

</main>

<footer class="text-center padding-top-3 padding-bottom-1">
  <p>© 2018 • This project is on <a href="https://github.com/simple-mvc/simple">GitHub</a></p>
</footer>
<?php require __DIR__ . '/../partials/scripts.php'; ?>
</body>
</html>