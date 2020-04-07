<?php

session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>login php</title>
    </head>
    <body>
        <h1>Identifier ?</h1>
            <p>
                <?php

                $code_secret = "kangourou";

                if(isset($_POST['login']) AND strlen($_POST['login']) >= 1)
                {
                    echo '<br/>Ton login est : '. strip_tags($_POST['login']);
                    $login_ok = true;
                    $_SESSION['login'] = strip_tags($_POST['login']);
                    
                }
                else
                {
                    echo '<br/>Vous n\'avez pas rentrez de login !<br/>';
                    $login_ok = false;
                }
                if(isset($_POST['password']) AND $_POST['password'] == $code_secret)
                {
                    $_SESSION['password'] = strip_tags($_POST['password']);
                    $mdp_ok = true;
                }
                else
                {
                    echo '<br/>Votre mot de passe n\'est pas correct !';
                    $mdp_ok = false;
                }
                if($login_ok AND $mdp_ok)
                {
                    echo '<br/> IDENTIFICATION REUSSI ! <br/>';
                    include("afficher_infos.php");
                }
                else
                {
                    echo '<br/> Une erreur s\'est produite <br/>';
                    echo '<br/> <a href="login.php"> RETOUR FORMULAIRE </a>';
                }


                 ?>

            </p>
    </body>
</html>