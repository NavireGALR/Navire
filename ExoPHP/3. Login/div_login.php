<?php

session_start();

//APPEL DE LA BDD 
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=logbook;port=3308;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch (Exception $e)
{
        die('Erreur : ' . $e->gettitre());
}

//INIT VARIABLE user_logged
$_SESSION['user_logged'] = false;

//ON VA VERIF SI L'USER EXISTE
include("login_verif.php");

?>

<h2>DIV CONNEXION</h2>

        <?php
            //ON VERIFIE SI L'UTILISATEUR EST CO
            if($_SESSION['user_logged'])
            {
                echo '<br/> Bonjour  '. $_SESSION['login']. '<br/>'; 
                ?><a href="profil.php"> Voir mon profil </a><?php

            } // SINON ON VERIFIE S'IL EXISTE DES COOKIES
            else if(isset($_COOKIE['login']) AND isset($_COOKIE['password']))
            {
                $login_cookie = strip_tags($_COOKIE['login']);
                $pass_cookie = strip_tags($_COOKIE['password']);

                //SI OUI, ON COMPARE LES COOKIES A NOTRE BDD (LE COOKIE EST NORMALEMENT HASH)
                $req = $bdd->prepare('SELECT pass FROM members WHERE pseudo= :pseudo');
                $req->execute(array('pseudo'=> $login_cookie));
                $resultat = $req->fetch();

                    if($pass_cookie === $resultat['pass']){
                        $_SESSION['login'] = $login_cookie;
                        $_SESSION['user_logged'] = true;
                    }else{
                        $_SESSION['user_logged'] = false;
                    }
        
                $req->closeCursor();
                echo '<br/> Te revoila !  '. $_SESSION['login']. '<br/>'; 
                ?><a href="profil.php"> Voir mon profil </a><?php

            } //SINON ON LE LAISSE S'IDENTIFIER
            else {
                echo '<br/> Bonjour inconnu, identifie toi ! <br/>';
                
        ?>

                <form action="div_login.php" method="post">
                <p>
                    <label for="login"> Login :</label>
                    <input type="text" name="login" id="login" required autofocus>
                    <br/>

                    <label for="password"> Password :</label>
                    <input type="Password" name="password" id="password" required>
                    <br/>
                    <label for="remember"> Se souvenir de moi :</label>
                    <input type="checkbox" name="remember" id="remember"><br/>

                    <input type="submit" name="connexion" id="connexion" value="Connexion">
                    <br/>

                </p>
            </form>

           <a href="sign_up.php"> Pas encore de compte ? Enregistre toi !</a>
        <?php

            }
            
        ?>
        
       
    </body>
</html>