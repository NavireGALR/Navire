<?php $title = 'S\'enregistrer'; ?>

<?php ob_start(); ?>
<?php $googlekey = '6Ld_1-sUAAAAAJrKjHeqpqnC9PmVAhOoJ1wsEq51'; ?>
    

<article class="offset-lg-1 col-lg-10">

  <?= $alert ?>
    

  <div class="mx-2 row">
    <img src="zressources/images/ancre.png" alt="ancre" class="icon_title">
    <h1> S'enregistrer </h1>
  </div>

  <div class="alert text-white alert-dark my-3" role="alert">
    <h3 class="alert-heading"> Toujours plus de sécurité </h3>
    <p>Bonjour et merci de prendre le temps de vous enregistrer sur ce site !<br/>Ce site est toujours en cours de développement. Pour cette raison les adresses emails ne sont pas vérifiées. De même aucun cookie ne sera enregistré sur votre navigateur. Vos mots de passe sont néanmoins cryptés et ce site met tout en oeuvre pour assurer la sécurité de vos données!</p>
    <hr>
    <p class="mb-0">Malgré tout, il est recommandé de ne pas enregistrer votre adresse mail professionnelle</p>
  </div>
  <div class="alert alert-warning my-3" role="alert">
   Les champs marqués d'un * sont obligatoires.
  </div>

  <form action="index.php?action=signin&signin=ok" method="post" class="my-5">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="pseudo">Pseudo* : </label>
        <input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="Ex: Jean" required >
      </div>
      <div class="form-group col-md-6">
        <label for="mail">Email* :</label>
        <input type="email" class="form-control" name="mail" id="mail" placeholder="Adresse Email" required>
      </div>
    </div>
    <div class="form-group">
      <label for="inputAddress">Mot de passe* : </label>
      <input type="password" name="password" id="password"  placeholder="Mot de passe" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="confirm_password">Confirmation mot de passe* :</label>
      <input class="form-control" type="Password" name="confirm_password" id="confirm_password" placeholder="Confirmation mot de passe" required>
    </div>
    <div class="form-row">
      <div class="form-group col-md-2">
        <label for="city">Ville : </label>
        <input type="text" class="form-control" name="city" id="city" placeholder="Ex: Paris">
      </div>
      <div class="form-group col-md-4">
        <label for="company">Entreprise : </label>
        <input type="text" class="form-control" name="company" id="company" placeholder="Entreprise pour laquelle vous travaillez">
      </div>
      <div class="form-group col-md-6">
        <label for="currentPosition">Poste actuel : </label>
        <input type="text" class="form-control" name="currentPosition" id="currentPosition" placeholder="Votre fonction au sein de l'entreprise">
      </div>
    </div>
    <div class="form-group col-lg-12">
      <div class="g-recaptcha" data-sitekey="<?= $googlekey ?>"></div>
    </div>
    <button type="submit" name="signin" id="signin"class="btn btn-primary">S'enregistrer</button>
    <small class="text-muted">Montez à bord du navire !</small>
  </form>      
</article>



<?php $content = ob_get_clean();
 ?>

<?php require('view/template.php'); ?>