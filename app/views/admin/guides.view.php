<?php require 'partials/head.php'; ?>

    <!-- CONTENT -->
    <div class="app-dashboard-body-content off-canvas-content" data-off-canvas-content>

      <?php require __DIR__ . '/../partials/message.php'; ?>

      <h2 class="text-center">Fiches conseils</h2>
      <hr>

      <a class="button primary" href="/guides/create">Créer une fiche conseil</a>

      <table class="hover text-center">
        <thead>
        <tr>
          <th class="text-center">id</th>
          <th class="text-center">Titre</th>
          <th class="text-center show-for-medium">Statut</th>
          <th class="text-center show-for-medium">&nbsp;</th>
          <th class="text-center">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($guides as $guide) : ?>
          <tr>
            <td><?= $guide->id; ?></td>
            <td><?= $guide->title; ?></td>
            <?php if ($guide->published === "1") :?>
              <td class="show-for-medium">Publié</td>
              <td class="show-for-medium">
                <form class="display-inline margin-left-1" action="/guides/<?= $guide->id; ?>/unpublish" method="POST">
                  <input type="hidden" name="_method" value="PUT">
                  <button type="submit" class="button small warning margin-bottom-0">Dépublier</button>
                </form>
              </td>
            <?php else: ?>
              <td class="show-for-medium">Non publié</td>
              <td class="show-for-medium">
                <form class="display-inline margin-left-1" action="/guides/<?= $guide->id; ?>/publish" method="POST">
                  <input type="hidden" name="_method" value="PUT">
                  <button type="submit" class="button primary small margin-bottom-0">Publier</button>
                </form>
              </td>
            <?php endif; ?>
            <td>
              <a class="button primary small margin-bottom-0 show-for-large" href="/admin-guides/<?= $guide->id; ?>">
                <i class="fas fa-eye"></i>
              </a>
              <a class="button small warning margin-bottom-0" href="/guides/<?= $guide->id; ?>/edit">
                <i class="fas fa-edit"></i>
              </a>
              <button data-open="deleteGuide<?= $guide->id; ?>" class="button small alert margin-bottom-0">
                <i class="fas fa-trash"></i>
              </button>
              <div class="reveal" id="deleteGuide<?= $guide->id; ?>" data-reveal>
                <p class="padding-right-1">La fiche <strong><?= $guide->title; ?></strong> sera supprimée définitivement.</p>
                <form class="padding-vertical-1 text-center" action="/guides/<?= $guide->id; ?>" method="POST">
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">
                  <button type="submit" class="button alert margin-bottom-0">Oui, je sais ce que je fais.</button>
                </form>
                <button class="close-button" data-close aria-label="Close modal" type="button">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <!-- END CONTENT -->

<?php require __DIR__.'/../admin/partials/footer.php'; ?>


