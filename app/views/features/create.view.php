<?php require __DIR__.'/../admin/partials/head.php'; ?>

  <!-- CONTENT -->
  <div class="app-dashboard-body-content off-canvas-content" data-off-canvas-content>

    <a href="/admin-features"><i class="fas fa-long-arrow-alt-left"></i> Retour</a>

    <h2 class="text-center">Ajouter une spécialité</h2>
    <hr>

    <?php require __DIR__ . '/../partials/message.php'; ?>

    <div class="grid-x align-center margin-top-2">
      <div class="small-8 medium-6">
        <?php require __DIR__ . '/../partials/errors.php'; ?>
        <form action="/features" method="POST"
          <?= \Simple\Core\App::get('data-abide') == true ? 'data-abide' : '' ?> novalidate>

          <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">

          <div data-abide-error class="callout alert-callout-border alert" style="display: none;">
            <p><i class="fi-alert"></i> Le formulaire comporte des erreurs.</p>
          </div>

          <label>Spécialité&thinsp;*
            <input name="title" type="text" placeholder="Nom de la spécialité" required pattern="^.{3,50}$" value="<?= isset($title) ? $title : ''; ?>">
            <span class="form-error">
              Un titre est requis (minimum 3 caractères).
            </span>
          </label>
          <p class="help-text">Obligatoire. Minimum 3 caractères.</p>

          <input type="submit" class="button primary" value="Ajouter la spécialité">

        </form>
      </div>
    </div>

  </div>
  <!-- END CONTENT -->

<?php require __DIR__.'/../admin/partials/footer.php'; ?>

