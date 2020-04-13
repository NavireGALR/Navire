<?php $title = 'Se connecter'; ?>

<?php ob_start(); ?>
    <h1>Connectez vous ou Enregistrez vous</h1>

    <form action="index.php?action=connect" method="post">
        <p>
            <label for="login"> Login :</label>
            <input type="text" name="login" id="login" required autofocus>
            <br/>

            <label for="password"> Password :</label>
            <input type="Password" name="password" id="password" required>
            <br/>

            <label for="remember"> Se souvenir de moi :</label>
            <input type="checkbox" name="remember" id="remember" checked><br/>

            <input type="submit" name="connect" id="connect" value="Connexion">
            <br/>
        </p>
    </form>

   <a href="index.php?action=signinpage"> Pas encore de compte ? Enregistre toi !</a>


<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
