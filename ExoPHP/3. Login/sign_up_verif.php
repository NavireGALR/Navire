<?php       

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


            // ON VERIFIE QUE LE FORMULAIRE EST REMPLI 
            if(isset($_POST['enregistrer'])) 
            {

                //ON DEFINIT LA DATE DU JOUR
                setlocale(LC_TIME, "fr_FR", "French");
                $date = date('Y-m-d'); 
                $date_jour = strftime("%A %d %B %G", strtotime($date));


                //ON SUPPRIME LES EVENTUELLES BALISE HTML
                $pseudo_sign = strip_tags($_POST['pseudo']);
                 

                // ON VERIFIE QUE LE PSEUDO N'EXISTE PAS
                $pseudo_taken=false;
                $req = $bdd->query('SELECT pseudo FROM members');
                while($donnees = $req->fetch())
                {
                    if($pseudo_sign === $donnees['pseudo']){
                        $pseudo_taken=true;
                        echo 'Ce pseudo existe déjà !';
                    } 
                }
                $req->closeCursor();

            
                //ON VERIFIE QUE LES MDPs CORRESPONDENT ET ON CRYPTE LE MDP
                if($_POST['password'] === $_POST['confirm_password']) {
                    $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $pass_ok=true;
                }else {
                    $pass_ok=false;
                    echo 'Les mots de passe ne correspondent pas !';
                }


                //ON VERIFIE QUE LE MAIL EST CORRECT ET QU'IL N'EXISTE PAS
                $mail = strip_tags($_POST['mail']);
                $regex_mail='#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#';

                if (preg_match($regex_mail, $mail)) {

                    $mail_ok = true;
                    $mail_taken=false;

                        $req = $bdd->query('SELECT mail FROM members');
                        while($donnees = $req->fetch())
                        {
                            if($mail === $donnees['mail']){
                                $mail_taken=true;
                                echo 'Ce mail existe déjà !';
                            } 
                        }
                        $req->closeCursor();

                } else {
                    $mail_ok = false;
                    echo 'L\'adresse ' . $mail . ' n\'est pas valide, recommencez !';
                }


                //ON VERIFIE QUE TOUT EST OK AVANT D'ENVOYER A LA BDD 
                if(!$pseudo_taken AND !$mail_taken AND $pass_ok AND $mail_ok)
                {
                    echo 'Enregistrement réussi !';
                        $insert = $bdd->prepare('INSERT INTO members (pseudo, pass, mail, date_crea) 
                                    VALUES(:pseudo, :pass, :mail, :date_jour)');
                        $insert->execute(array(
                            'pseudo'=> $pseudo_sign,
                            'pass'=> $pass_hash,
                            'mail'=> $mail,
                            'date_jour' => $date_jour
                        ));

                        $insert->closeCursor();
                        ?><br/><a href="index.php"> Retour acceuil </a><?php

                }

            }

?>