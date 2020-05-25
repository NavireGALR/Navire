<?php $title = 'Se connecter'; ?>

<?php ob_start(); ?>

<article class="my-5 mx-auto offset-lg-6">
  <form  action="index.php?action=login&login=ok" method="post">
      <div class="form-group">
      <label for="login">Identifiant: </label>
      <input type="text" name="login" id="login" class="form-control" placeholder="Ex: Jean" required>
    </div>
    <div class="form-group">
      <label for="password">Mot de passe: </label>
       <input type="password" name="password" id="password" required class="form-control" placeholder="Mot de passe">
    </div>
    <button type="submit" name="connect" id="connect" class="btn btn-primary">Se connecter</button>
    <div class="w-100"></div>
    <a href="index.php?action=signin"> Pas encore de compte ? Enregistre toi !</a>
  </form>
</article>

<?php 
$content = ob_get_clean();
?>

<?php require('view/template.php'); ?>
