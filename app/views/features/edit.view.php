<?php require __DIR__.'/../admin/partials/head.php'; ?>

  <!-- CONTENT -->
  <div class="app-dashboard-body-content off-canvas-content" data-off-canvas-content>

    <div class="grid-x align-justify">
      <a href="/admin-features"><i class="fas fa-long-arrow-alt-left"></i> Retour aux spécialités</a>
      <button data-open="deleteFeature" class="button small alert margin-bottom-0">
        <i class="fas fa-trash"></i>
        Supprimer la spécialité
      </button>
    </div>

    <div class="reveal" id="deleteFeature" data-reveal>
      <p>La spécialité sera supprimée définitivement.</p>
      <form class="padding-vertical-1 text-center" action="/features/<?= $feature->id; ?>" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">
        <button type="submit" class="button alert margin-bottom-0">Je sais ce que je fais.</button>
      </form>
      <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <h2 class="text-center">Modifier «&thinsp;<?= $feature->title; ?>&thinsp;»</h2>
    <hr>

    <?php require __DIR__ . '/../partials/message.php'; ?>

    <div class="grid-x align-center margin-top-2">
      <div class="small-8 medium-6">
        <?php require __DIR__ . '/../partials/errors.php'; ?>
        <form action="/features/<?= $feature->id; ?>" method="POST"
          <?= \Simple\Core\App::get('data-abide') == true ? 'data-abide' : '' ?> novalidate>

          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">

          <div data-abide-error class="callout alert-callout-border alert" style="display: none;">
            <p><i class="fi-alert"></i> Le formulaire comporte des erreurs.</p>
          </div>

          <label>Spécialité
            <input name="title" type="text" placeholder="Nom de la spécialité" value="<?= $feature->title; ?>" required pattern="^.{3,50}$">
            <span class="form-error">
              Un nom est requis (minimum 3 caractères).
            </span>
          </label>
          <p class="help-text">Obligatoire. Minimum 3 caractères.</p>

          <input type="submit" class="button" value="Mettre à jour">

        </form>
      </div>
    </div>

  </div>
  <!-- END CONTENT -->

<?php require __DIR__.'/../admin/partials/footer.php'; ?>


