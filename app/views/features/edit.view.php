<?php require __DIR__.'/../partials/head.php'; ?>
<h1 class="text-center margin-bottom-2">Edit <?= $feature->title; ?></h1>
<div class="grid-x">
  <div class="cell small-8 small-offset-2 medium-6 medium-offset-3">
    <form action="/features/<?= $feature->id; ?>" method="POST">
      <input type="hidden" name="_method" value="PUT">
      <label>Title
        <input name="title" type="text" placeholder="Title of the feature" value="<?= $feature->title; ?>">
      </label>
      <label>Description
        <textarea name="description" placeholder="Description of the feature" rows="3" ><?= $feature->description; ?></textarea>
      </label>
      <input type="submit" class="button" value="Submit">
    </form>
  </div>
</div>
<?php require __DIR__.'/../partials/footer.php'; ?>


