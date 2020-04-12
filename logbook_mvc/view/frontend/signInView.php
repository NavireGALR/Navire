<?php $title = 'Se connecter'; ?>

<?php ob_start(); ?>
    <h1>Enregistrez vous !</h1>
    <form action="index.php?action=signin" method="post">
                <p>
                    <strong>Tous les champs sont obligatoires</strong><br/>
                    <label for="pseudo"> Pseudo :</label><br/>
                    <input type="text" name="pseudo" id="pseudo" autofocus required>
                    <br/>

                    <label for="password"> Mot de passe:</label><br/>
                    <input type="Password" name="password" id="password" required>
                    <br/>

                    <label for="confirm_password"> Confirmation mot de passe:</label><br/>
                    <input type="Password" name="confirm_password" id="confirm_password" required>
                    <br/>

                    <label for="mail"> Adresse m@il :</label>
                    <input type="mail" name="mail" id="mail" required><br/>

                    <input type="submit" name="signin" id="signin" value="S'enregistrer">
                    <br/>
                </p>
            </form>
    


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>