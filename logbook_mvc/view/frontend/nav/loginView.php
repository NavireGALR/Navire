<?php $title = 'Se connecter'; ?>

<?php ob_start(); ?>

<article class="my-5 offset-lg-2 col-lg-8">
  <form class="my-5" action="index.php?action=connect" method="post" id="form_login">
      <div class="form-group">
      <label for="login">Identifiant : </label>
      <input type="text" name="login" id="login" class="form-control" placeholder="Ex: Jean" required>
    </div>
    <div class="form-group">
      <label for="password">Mot de passe : </label>
       <input type="password" name="password" id="password" required class="form-control" placeholder="Mot de passe">
    </div>
    <button type="submit" name="connect" id="connect" class="btn btn-primary">Se connecter</button>
    <a href="index.php?action=signinView"> Pas encore de compte ? Enregistre toi !</a>
  </form>
</article>

<?php 
$content = ob_get_clean();
?>

<?php require('view/template.php'); ?>
