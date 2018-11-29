<?php require __DIR__.'/../partials/head.php'; ?>
  <h1 class="text-center margin-bottom-2">Articles</h1>
  <div class="grid-x align-center">
    <div class="small-10 medium-6">
      <?php if (count($posts) > 0) : ?>
        <?php foreach ($posts as $post) : ?>
          <a href="/posts/<?= $post->id ?>">
            <div class="media-object">
              <?php if ($post->cover) : ?>
                <div class="media-object-section">
                  <div class="thumbnail">
                    <img src="/img/sm-<?= $post->cover ?>" width="175">
                  </div>
                </div>
              <?php endif; ?>
              <div class="media-object-section">
                <h4 class="margin-bottom-0"><?= $post->title ?></h4>
                <p class="font-italic">
                  <time>
                    <?php
                      $date = new DateTime($post->created_at);
                      echo $date->format('M d, Y');
                    ?>
                  </time>
                  by John Doe
                </p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet at atque deserunt.</p>
              </div>
            </div>
          </a>
          <hr>
        <?php endforeach; ?>
      <?php else : ?>
        <p class="lead text-center">There are no articles to display.</p>
      <?php endif; ?>
    </div>
  </div>
<?php require __DIR__.'/../partials/footer.php'; ?>
