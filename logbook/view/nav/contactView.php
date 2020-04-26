<?php $title = 'Me contacter'; ?>

<?php ob_start(); ?>

<article class="offset-lg-1 col-lg-6 order-lg-first order-last">

<?= $alert ?>


  <form method="post" action="index.php?action=mailto">
          <h2>Formulaire de contact</h2>
          
          <div class="form-group">
              <label for="email"> Votre adresse email * :</label> 
              <input class="form-control" placeholder="email@exemple.com" type="email" name="email" id="email" required>
          </div>

          <div class="form-group">
              <label for="organisation"> Entreprise/Organisation :</label> 
              <input  class="form-control" placeholder="Nom de votre entreprise" type="text" name="company" id="company">
          </div>

          <div class="form-group">
              <label for="objet">Objet de votre demande de contact * :</label>
              <select class="form-control" name="objet" id="objet">
                  <optgroup label="Me recruter">
                      <option value="être recontacté">Être recontacté</option>
                      <option value="proposition d'entretien" selected>Proposer un entretien</option>
                  </optgroup>
                  <optgroup label="Logbook">
                      <option value="Devenir rédacteur">Demander à devenir rédacteur du logbook</option>
                      <option value="Rejoindre le discord">Demander le discord du navire</option>
                      <option value="Accès Github"> En savoir plus sur le GitHub </option>
                  </optgroup>
                  <optgroup label="Autre">
                      <option value="Amélioration">Proposer une amélioration pour ce site</option>
                      <option value="Autre">Autre...</option>
                  </optgroup>
              </select>
          </div>


          <div class="form-group">
              <label for="commentaire"> Votre commentaire :</label>
              <textarea class="form-control" placeholder="Texte" name="message" id="message"></textarea>
          </div>

          <button type="submit" name="send" id="send" class="btn btn-primary">Envoyer votre message</button>
  </form>
  
</article>

<aside class="col-lg-4 mx-auto order-lg-last order-first">
  <div class="card bg-dark border-primary text-white">
    <h3 class="card-header bg-primary">Me suivre sur les réseaux</h3>
    <div class="my-4 row justify-content-around">
      <div class="col-lg-1 col-3">
        <a href="https://www.facebook.com/bastien.ederhy.5" target="_blank">
          <img class="icon" src="zressources/images/facebook.png" alt="fb"/>
        </a>
      </div>
      <div class="col-lg-1 col-3">
        <a href="https://twitter.com/EderCaptain" target="_blank">
          <img class="icon" src="zressources/images/twitter.png" alt="twitter"/>       
        </a>
      </div>
      <div class="col-lg-1 col-3">
        <a href="https://www.linkedin.com/in/bastien-ederhy/" target="_blank">
          <img class="icon" src="zressources/images/linkedIn.png" alt="linkedin"/>
        </a>
      </div>
      <div class="col-lg-1 col-3">
        <a href="mailto:ederhy.bastien@gmail.com" target="_blank">
          <img class="icon" src="zressources/images/mail.png" alt="mail"/>
        </a>
      </div>
    </div>

    <ul class="row justify-content-around">
      <li class="row"><img class="icon mr-3" src="zressources/images/skype.png" alt="skype"/><h4 class="align-self-center">steok13</h4></li>
      <li class="row"><img class="icon mr-3" src="zressources/images/discord.png" alt="discord"/><h4 class="align-self-center"> Ekawa#3878 </h4></li>
    </ul>
      

  </div>
</aside>

<?php 
$content = ob_get_clean();
?>

<?php require('view/template.php'); ?>
