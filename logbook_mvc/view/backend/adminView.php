<?php $title = 'Page Admin'; ?>

<?php ob_start(); ?>

<article class="offset-lg-1 col-lg-10">

    <?php if(isset($alert_ok)){?>
    <div class="alert alert-success my-3" role="alert">
        <?= $alert_ok ?>
    </div>
     <?php }?>

    <div class="row">
        <img src="zressources/images/ancre.png" alt="ancre" class="icon_tittle">
        <h1>Page d'administration des utilisateurs</h1>
    </div>

    <div class="my-5">
        <h2>Changer l'utilisateur de groupe</h2>
        <form class="p-4 my-5 col-lg-5" id="form_updategroup" action="index.php?action=update_group" method="post">
            <div class="form-group">
                <label for="pseudo "> Pseudo de l'utilisateur :</label>
                <input type="text" name="pseudo" id="pseudo" required autofocus>
            </div>
            <div class="form-group">
                <select name="newgroup" id="newgroup">
                    <option value="1">1. Captain</option>
                    <option value="2" selected >2. Sailor</option>
                    <option value="3">3. Recruiter</option>
                    <option value="4">4. Writer </option>
                </select>
                <button type="submit" name="confirm_change_group" id="confirm_change_group" class="my-lg-2 btn btn-primary">Confirmer</button>
            </div>
        </form>
    </div>

    <div class="my-5">
        <h2>Compteur de visiteurs</h2>
    </div> 
    <span> Au total, Logbook a reçu <?= $nb_view ?> visiteurs !</span>

    <div class="my-5">
        <a href="index.php?action=profil">
            <button id="profil_btn" class="my-lg-2 btn btn-dark">Retour profil</button>
        </a>
    </div>

</article>
    

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
