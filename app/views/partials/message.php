<?php if (isset($_SESSION['flash_message'])) : ?>
  <?php

  $error = $_SESSION['flash_message'];
  $level = key($error);

  session_unset();
  session_destroy();
  ?>
  <div class="callout <?= $level; ?>" role="alert">
    <div class="grid-container">
      <?= $error[$level]; ?>
    </div>
  </div>
<?php endif; ?>


