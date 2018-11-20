<?php if (isset($_SESSION['flash_message'])) : ?>
  <?php
  $error = $_SESSION['flash_message'];
  $level = key($error);
  unset($_SESSION['flash_message']);
  ?>
  <div class="callout <?= $level; ?> margin-bottom-1" role="alert">
    <div class="grid-container">
      <?= $error[$level]; ?>
    </div>
  </div>
<?php endif; ?>


