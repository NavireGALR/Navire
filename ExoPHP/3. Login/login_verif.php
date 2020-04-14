<?php            

            // ON VERIFIE QUE LE FORMULAIRE EST REMPLI 
            if(isset($_POST['connexion'])) 
            {

            
                //ON SUPPRIME LES EVENTUELLES BALISE HTML
                $login = strip_tags($_POST['login']);
                 

                // ON VERIFIE QUE LE PSEUDO ET LE MDP CORRESPONDENT
                $req = $bdd->prepare('SELECT pass FROM members WHERE pseudo= :pseudo');
                $req->execute(array('pseudo'=> $login));
                $resultat = $req->fetch();
                $password_correct = password_verify($_POST['password'], $resultat['pass']);

                    if($password_correct){
                        $_SESSION['login'] = $login;
                        $_SESSION['password'] = $resultat['pass'];
                        $_SESSION['user_logged'] = true;
                    }else{
                        echo 'Le login ou le mot de passe ne correspondent pas !';
                        $_SESSION['user_logged'] = false;
                    }
                $req->closeCursor();

                //ON AJOUTE AUX COOKIES SI LA CASE REMEMBER EST COCHE
                if(isset($_POST['remember']) AND $_SESSION['user_logged']){

                    setcookie('login', $_SESSION['login'], time() + 365*24*3600, null, null, false, true);
                    setcookie('password', $_SESSION['password'], time() + 365*24*3600, null, null, false, true);
                    
                }

            }

?>