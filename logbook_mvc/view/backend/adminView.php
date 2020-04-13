<?php $title = 'Page Admin'; ?>

<?php ob_start(); ?>
    <h1>Ma page d'administration</h1>

    <h2> Modifier le groupe d'un utilisateur </h2>

    <?= $msg ?>

    <form action="index.php?action=update_group" method="post">
        <p>
            <label for="pseudo "> Pseudo de l'utilisateur :</label>
            <input type="text" name="pseudo" id="pseudo" required autofocus>
            <br/>

            <select name="newgroup" id="newgroup">
        	 	<option value="1">1. Captain</option>
        	 	<option value="2" selected >2. Sailor</option>
        	 	<option value="3">3. Recruiter</option>
        	 	<option value="4">4. Writer </option>
            </select>

            <input type="submit" name="confirm_change_group" id="confirm_change_group" value="Confirmer">
            <br/>
        </p>
    </form>

    <br/><a href="index.php?action=profil"> Retour au Profil </a>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
