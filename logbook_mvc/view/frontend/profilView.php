<?php $title = 'Mon Profil'; ?>

<?php ob_start(); ?>
    <h1>Profil de <?= $pseudo ?> </h1>

    <div class="profil">

        Bonjour <?= $pseudo ?> <br/>
        Ton adresse mail enregistré : <?= $mail ?><br/>
        Tu appartiens au groupe : <?= $id_group ?><br/>
        Ton profil a été créé le <?= $date_crea ?><br/>
        Ville : <?= $city ?><br/>
        Entreprise : <?= $entreprise ?><br/>
        Poste actuel : <?= $actual_function ?><br/>
        <br/>

    
        <h2>Modifier mon profil</h2>

        <form method="post" action="index.php?action=update">
            <p class="login_update">
                <h3>Pseudo</h3>
                <label for="pseudo"> Choisir un nouveau pseudo :</label>
                <input type="text" name="new_pseudo" id="pseudo_update">
                <br/>
                <input type="submit" name="pseudo_update" value="Mettre à jour mon pseudo">
            </p>


            <p class="pass_update">
                <h3>Mot de passe</h3>
                <label for="password"> Mot de passe actuel :</label>
                <input type="password" name="actual_pass" id="actual_pass">
                <br/>
                <label for="password"> Nouveau mot de passe :</label>
                <input type="password" name="new_pass1" id="new_pass1">
                <br/>
                <label for="password"> Confirmer nouveau mot de passe :</label>
                <input type="password" name="new_pass2" id="new_pass2">
                <br/>
                <input type="submit" name="pass_update" value="Changer mon mot de passe">
            </p>
        </form>

        <form method="post" action="index.php?action=add">

            <p class="add">
                <h3>Ajouter des infos !</h3>

                <label for="city"> Ville :</label>
                <input type="text" name="city" id="city">
                <input type="submit" name="add_city" value="Ajouter cette info !">
                <br/>
                <label for="entreprise"> Entreprise :</label>
                <input type="text" name="entreprise" id="entreprise">
                <input type="submit" name="add_entreprise" value="Ajouter cette info !">
                <br/>
                <label for="function"> Poste actuel :</label>
                <input type="text" name="function" id="function">
                <input type="submit" name="add_function" value="Ajouter cette info !">
                <br/>
            </p>
        </form>

    </div>  

    <a href="index.php?action=none">Retour à l'acceuil</a>
    <a href="index.php?action=listpost">Retour aux articles</a>

    <form method="post" action="index.php?action=out">
        <p>
            <br/>
            <input type="submit" name="out" value="Déconnexion">
            <br/>
        </p>
    </form>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
