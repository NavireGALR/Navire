<?php 

            // VERIFICATION AVANT D'INSERER LE BILLET DANS LA BDD 
            $contenu_billet_exist = false;

            $req = $bdd->query('SELECT contenu FROM billets');
            while($donnees = $req->fetch())
            {
                if(isset($_POST['contenu_billet']))
                {
                    if($donnees['contenu'] === $_POST['contenu_billet'])
                    {
                        $contenu_billet_exist = true;
                    }
                }
            }
            $req->closeCursor();

            if(isset($_POST['auteur']) AND strlen($_POST['auteur']) >= 1) {
                $_SESSION['auteur'] = strip_tags($_POST['auteur']);
                $auteur_ok = true;
            } else {
                $auteur_ok = false;
            }


                if(isset($_POST['titre']) AND strlen($_POST['auteur']) >= 1) {
                    $_SESSION['titre'] = strip_tags($_POST['titre']);
                    $titre_ok = true;
                } else {
                    $titre_ok = false;
                }


                    if(isset($_POST['contenu']) AND strlen($_POST['contenu']) >= 1 AND !$contenu_billet_exist) {
                        $_SESSION['contenu'] = nl2br(strip_tags($_POST['contenu']));
                        $contenu_ok = true;
                    } else {
                        $contenu_ok = false;
                    }

            // INSERER LE BILLET DANS LA BDD 
            if($auteur_ok AND $titre_ok AND $contenu_ok) {
                $insert = $bdd->prepare('INSERT INTO billets (titre, auteur, contenu, date_billet) 
                                VALUES(:titre, :auteur, :contenu, NOW())');
                $insert->execute(array(
                                'titre'=> $_SESSION['titre'],
                                'auteur'=> $_SESSION['auteur'],
                                'contenu'=> $_SESSION['contenu'],
                            ));

                $insert->closeCursor();
            } else if ($auteur_ok AND $titre_ok AND !$contenu_ok) {
                echo 'Erreur, ce contenu existe déjà !';
            }




            // VERIFICATION AVANT D'INSERER LES COMMENTAIRES DANS LA BDD

            if(isset($_POST['pseudo']) AND strlen($_POST['pseudo']) >= 1) {
                $_SESSION['pseudo'] = strip_tags($_POST['pseudo']);
                $pseudo_ok = true;
            } else {
                $pseudo_ok = false;
            }

                if(isset($_POST['commentaires']) AND strlen($_POST['pseudo']) >= 1) {
                    $_SESSION['commentaire'] = nl2br(strip_tags($_POST['commentaires']));
                    $com_ok = true;
                } else {
                    $com_ok = false;
                }



            if($pseudo_ok AND $com_ok) {
                $insert = $bdd->prepare('INSERT INTO commentaires (pseudo, id_billet, commentaire, date_commentaire) 
                                VALUES(:pseudo, :id_billet, :commentaire, NOW())');
                $insert->execute(array(
                                'id_billet'=> $_SESSION['id_billet'],
                                'pseudo'=> $_SESSION['pseudo'],
                                'commentaire'=> $_SESSION['commentaire'],
                            ));

                $insert->closeCursor();
            } else if($pseudo_ok AND !$com_ok) {
                echo  'Erreur';
            }


?>