<?php require 'partials/head.php'; ?>

      <!-- CONTENT -->
      <div class="app-dashboard-body-content off-canvas-content" data-off-canvas-content>

        <?php require __DIR__ . '/../partials/message.php'; ?>

        <h2 class="text-center">Dashboard</h2>
        <hr>
        <div class="margin-top-2">
          <section>
            <h3>Features</h3>
            <table class="hover text-center dashboard">
              <thead>
              <tr>
                <th class="text-center">id</th>
                <th class="text-center">Title</th>
                <th class="text-center show-for-large">Status</th>
              </tr>
              </thead>
              <tbody>
              <?php foreach ($features as $feature) : ?>
                <tr>
                  <td><?= $feature->id; ?></td>
                  <td><a href="/features/<?= $feature->id; ?>/edit"><?= $feature->title; ?></a></td>
                  <?php if ($feature->published === "1") :?>
                    <td class="show-for-large">Published</td>
                  <?php else: ?>
                    <td class="show-for-large">Unpublished</td>
                  <?php endif; ?>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </section>
        </div>

      </div>

  <?php require __DIR__.'/../partials/scripts.php'; ?>
  <script>
      $('[data-app-dashboard-toggle-shrink]').on('click', function(e) {
          e.preventDefault();
          $(this).parents('.app-dashboard').toggleClass('shrink-medium').toggleClass('shrink-large');
      });

      $(document).ready(function() {

          $('table tr').click(function() {
              let href = $(this).find("a").attr("href");
              if(href) {
                  window.location = href;
              }
          });

      });

  </script>
</body>
</html>


