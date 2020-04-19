<?php $title = 'Problème à bord'; ?>

<?php ob_start(); ?>

<article class="offset-lg-2 col-lg-8">

  <div class="alert alert-warning my-3" role="alert">
    <?= $alert ?>
    <br/><a href="<?= $_SERVER["HTTP_REFERER"] ?>" class="alert-link">Retour à la page précédente</a>

  </div>


</article>



<?php 
$content = ob_get_clean();
?>

<?php require('view/template.php'); ?>
