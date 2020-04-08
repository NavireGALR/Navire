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

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Derniers articles !</title>
        <link rel="stylesheet" type="text/css" href="blog.css">
    </head>
    <body>
        <h1>Derniers articles</h1>

          <?php 
            $contenu_exist = false;

            $req1 = $bdd->query('SELECT * FROM billets');
            while ($donnees = $req1->fetch()) {
                if(isset($_POST['contenu']))
                {
                    if($donnees['contenu'] === $_POST['contenu'])
                    {
                        $contenu_exist = true;
                    }
                }
            }
            $req1->closeCursor();

            if(isset($_POST['auteur']) AND strlen($_POST['auteur']) >= 1)
            {
                $_SESSION['auteur'] = strip_tags($_POST['auteur']);
                $auteur_ok = true;

            }
            else
            {
                $auteur_ok = false;
            }

            if(isset($_POST['titre']) AND strlen($_POST['auteur']) >= 1)
            {
                $_SESSION['titre'] = strip_tags($_POST['titre']);
                $titre_ok = true;
            }
            else
            {
                $titre_ok = false;
            }
            if(isset($_POST['contenu']) AND strlen($_POST['contenu']) >= 1 AND $contenu_exist == false)
            {
                $_SESSION['contenu'] = strip_tags($_POST['contenu']);
                $contenu_ok = true;
            }
            else
            {
                $contenu_ok = false;
            }

            if($auteur_ok AND $titre_ok AND $contenu_ok)
            {
                $insert = $bdd->prepare('INSERT INTO billets (titre, auteur, contenu, date_billet) 
                                VALUES(:titre, :auteur, :contenu, NOW())');
                $insert->execute(array(
                                'titre'=> $_SESSION['titre'],
                                'auteur'=> $_SESSION['auteur'],
                                'contenu'=> $_SESSION['contenu'],
                            ));

                $insert->closeCursor();

            }
            else
            {
                $_SESSION['erreur'] = 'Erreur, vous devez remplir le formulaire ! (ou ce contenu existe déjà)';
                echo $_SESSION['erreur'];
            }
            

                $req2 = $bdd->query('SELECT * FROM billets ORDER BY id DESC');
                while ($donnees = $req2->fetch())
                { 
                   ?>
                    <div id="billet">
                        <h2><?php echo $donnees['titre'];?>  créé par <?php echo $donnees['auteur'];?>  le <?php echo $donnees['date_billet'];?> </h2>
                        <p> 
                            <?php echo $donnees['contenu'];?>
                        </p>
                        <a href="commentaires_billets.php?billet=<?php echo $donnees['id']; ?>"> Voir les commentaires </a>
                    </div>
                    <?php
                }
                
                $req2->closeCursor();

        ?>
        
    
        <form action="billets.php" method="post">
            <p>
                <label for="auteur"> Auteur : </label>
                <input type="text" name="auteur" id="auteur">
                <br/>

                <label for="titre"> Titre :</label>
                <input type="text" name="titre" id="titre">
                <br/>

                <label for="contenu"> Contenu : </label><br/>
                <textarea name="contenu" id="contenu"></textarea>
                <br/>

                <input type="submit" name="valider" id="valider" value="valider">
                <br/>
            </p>
        </form>

      
    </body>
</html>