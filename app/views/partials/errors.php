<?php if (isset($_SESSION['errors'])) : ?>
  <?php $errors = $_SESSION['errors']; unset($_SESSION['errors']);
  foreach ($errors as $error) : ?>
    <div class="callout alert-callout-border alert">
      <?= $error; ?>
    </div>
  <?php endforeach; ?>
<?php endif; ?>


