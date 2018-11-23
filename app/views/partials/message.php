<?php if (isset($_SESSION['flash_message'])) : ?>
  <?php
  $error = $_SESSION['flash_message'];
  $level = key($error);
  unset($_SESSION['flash_message']);
  ?>
  <div class="callout <?= $level; ?> margin-bottom-1" role="alert" data-closable>
    <p class="margin-bottom-0"><?= $error[$level]; ?></p>
    <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif; ?>

