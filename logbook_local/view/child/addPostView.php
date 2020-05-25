<?php $title = 'Ajouter un article'; ?>

<?php ob_start(); ?>

<article class="offset-lg-2 col-lg-8">

  <form action="index.php?action=add_post&add=ok" method="post" id="form_post">
    <div class="form-group">
      <label for="title">Titre de l'article : </label>
      <input type="text" name="title" id="title" class="form-control" required>
    </div>

      <label for="content_post">Article : </label>
      <textarea name="content_post" id="content_post" required></textarea>


    <button type="submit" name="add_new_post" id="add_new_post" class="btn btn-primary">Publier</button>
  </form>
</article>

<?php 
$content = ob_get_clean();
?>

<?php require('view/template.php'); ?>