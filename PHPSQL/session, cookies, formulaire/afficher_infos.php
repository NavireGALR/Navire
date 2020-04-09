<?php

if(isset($_SESSION['login']))
{
    setcookie('login', $_SESSION['login'], time() + 365*24*3600, null, null, false, true);
}
else
{

}
if(isset($_SESSION['password']))
{
    setcookie('password', $_SESSION['password'], time() + 365*24*3600,  null, null, false, true);
}


?>
            <p>
                Voici les codes secrets de la NASA : <br/>
                PIPOISDMLKSLFLD-QSLDKDKJFS-KIATUEKENNEDY?-
            </p>
            <p>
                Bonjour <?php echo $_SESSION['login'] ?> !<br/>
                Le mot de passe était bien sûr  : <?php echo $_SESSION['password'] ?> !<br/>
                A bientôt ! <br/>
                <a href="login.php"> RETOUR FORMULAIRE </a>
                <br/>
                <a href="fonctions fichiers/testfichier.php"> VOIR LES DONNES DU FICHIER</a>
            </p>
            <p>

                 <form method="post" action="deco.php">
                     <input type="submit" name="deco" formaction="deco.php" value="Déconnexion">
                     <input type="submit" name="forget" formaction="deco.php" value="Effacer mes données">
                 </form>

            </p>
