<?php

// SESSION START 
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
    </head>
    <body>
    	<header>
            <link href="blog2.css" rel="stylesheet"/>
        </header>
        <h1>Commentaires du billet</h1>

    	
				<?php
				$req = $bdd->prepare('SELECT * FROM billets WHERE id= :id');
				$req->execute(array('id'=> $_SESSION['id_billet']));
				$donnees = $req->fetch(); 

				if(empty($donnees['id'])) {
                    echo 'Erreur : Ce billet n\'existe pas ou plus !';
            	} else {
            		?>
            			<div class="billet">
                        <h2><?php echo $donnees['titre'];?>  créé par <?php echo $donnees['auteur'];?>  le <?php echo $donnees['date_billet'];?> </h2>
                        <p> 
                            <?php echo $donnees['contenu'];?>
                        </p>
                        <a href="billets.php"> Retour au billets </a>
                        </div>
                    <?php

            	    $req->closeCursor();	
            	}
					?>
		

		<div id="comments">
            <?php
        	
           	include('blog_traitement.php');

                $req = $bdd->prepare('SELECT *, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM commentaires WHERE id_billet= :id');
                $req->execute(array('id' => $_SESSION['id_billet']));

                while ($donnees = $req->fetch())
                {
                    ?>
                    <p><strong><?php echo $donnees['pseudo']; ?></strong> <em>le <?php echo $donnees['date_creation_fr']; ?></em> : <br/><?php echo $donnees['commentaire']; ?></p>
                    <?php
                }

                $req->closeCursor();

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

                <input type="submit" name="valider" id="valider" value="Envoyer">
                <br/>
            </p>
        </form>
    </body>
</html>
