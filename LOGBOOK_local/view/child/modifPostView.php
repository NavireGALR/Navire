<?php $title = 'Modifier un article'; ?>

<?php ob_start(); ?>

<article class="offset-lg-2 col-lg-8">

  <form action="index.php?action=modif_post&modif=ok&post=<?= $post['id'] ?>" method="post" id="form_modifpost">
    <div class="form-group">
      <label for="title">Titre de l'article : </label>
      <input type="text" name="title_modif" id="title_modif" class="form-control" value="<?= $post['title']?>" required>
    </div>
    <div class="my-2 form-group">
	    <button type="submit" name="del_post" id="delete_post" class="btn btn-warning">
	   		Supprimer l'article
		</button>
	</div>

    <label for="content_post">Article : </label>
    <textarea name="content_post_modif" id="content_post" required>  <?= $post['content']?> </textarea>

    <button type="submit" name="modif_post" id="modif_post" class="btn btn-primary">Publier</button>
  </form>

</article>

<?php 
$content = ob_get_clean();
?>

<?php require('view/template.php'); ?>