<?php
session_start();

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=bastien;port=3308;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch (Exception $e)
{
        die('Erreur : ' . $e->gettitre());
}

if(isset($_GET['billet']))
{
$_SESSION['id_billet'] = $_GET['billet'];
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Commentaires</title>
        <link rel="stylesheet" type="text/css" href="blog.css">
    </head>
    <body>
        <h1>Commentaires du billet</h1>


<?php
				$req = $bdd->prepare('SELECT * FROM billets WHERE id= :id');
				$req->execute(array('id'=> $_SESSION['id_billet']));
                while ($donnees = $req->fetch())
                { 
                   ?>
                    <div id="billet">
                        <h2><?php echo $donnees['titre'];?>  créé par <?php echo $donnees['auteur'];?>  le <?php echo $donnees['date_billet'];?> </h2>
                        <p> 
                            <?php echo $donnees['contenu'];?>
                        </p>
                        <a href="billets.php"> Retour au billets </a>
                    </div>
                    <?php
                }
                $req->closeCursor();

?>


<div id="comments">
            <?php

            $com_exist = false;

            $req3 = $bdd->query('SELECT * FROM commentaires');
            while ($donnees = $req3->fetch()) {
                if(isset($_POST['commentaires']))
                {
                    if($donnees['commentaire'] === $_POST['commentaires'])
                    {
                        $com_exist = true;
                    }
                }
            }
            $req3->closeCursor();
            if(isset($_POST['pseudo']) AND strlen($_POST['pseudo']) >= 1)
            {
                $_SESSION['pseudo'] = strip_tags($_POST['pseudo']);
                $pseudo_ok = true;

            }
            else
            {
                $pseudo_ok = false;
            }

            if(isset($_POST['commentaires']) AND strlen($_POST['pseudo']) >= 1 AND !$com_exist)
            {
                $_SESSION['commentaire'] = strip_tags($_POST['commentaires']);
                $com_ok = true;
            }
            else
            {
                $com_ok = false;
            }

            if($pseudo_ok AND $com_ok)
            {
                $insert = $bdd->prepare('INSERT INTO commentaires (pseudo, id_billet, commentaire, date_commentaire) 
                                VALUES(:pseudo, :id_billet, :commentaire, NOW())');
                $insert->execute(array(
                                'id_billet'=> $_SESSION['id_billet'],
                                'pseudo'=> $_SESSION['pseudo'],
                                'commentaire'=> $_SESSION['commentaire'],
                            ));

                $insert->closeCursor();
            }
            else
            {
                $_SESSION['erreur'] = 'Erreur, vous devez remplir le formulaire ! (ou ce contenu existe déjà)';
                echo $_SESSION['erreur'];
            }

           

                $req2 = $bdd->prepare('SELECT * FROM commentaires WHERE id_billet= :id');
                $req2->execute(array('id' => $_SESSION['id_billet']));

                while ($donnees = $req2->fetch())
                {
                    ?>
                    <p><strong><?php echo $donnees['pseudo']; ?> le : <?php echo $donnees['date_commentaire']; ?> : </strong><br/><?php echo $donnees['commentaire']; ?></p>
                    <?php
                }

                $req2->closeCursor();

            ?>
</div>

		<form action="commentaires_billets.php" method="post">
            <p>
                <label for="pseudo"> Pseudo: </label>
                <input type="text" name="pseudo" id="pseudo">
                <br/>

                <label for="commentaires"> Commentaires : </label><br/>
                <textarea name="commentaires" id="commentaires"></textarea>
                <br/>

                <input type="submit" name="valider" id="valider" value="valider">
                <br/>
            </p>
        </form>
    </body>
</html>
