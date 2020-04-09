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

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Derniers articles !</title>
        
    </head>
    <body>
        <header>
            <link href="blog2.css" rel="stylesheet"/>
        </header>
        <h1>Derniers articles</h1>

        
        <?php 
            
                include("blog_traitement.php");

                $req = $bdd->query('SELECT *, DATE_FORMAT(date_billet, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY id DESC');
                while ($donnees = $req->fetch())
                { 
                   ?>
                        <div class="billet">
                        <h2><?php echo $donnees['titre'];?>  créé par <?php echo $donnees['auteur'];?>  le <?php echo $donnees['date_creation_fr'];?> </h2>
                        <p> 
                            <?php echo $donnees['contenu'];?>
                        </p>
                        <a href="commentaires_billets.php?billet=<?php echo $donnees['id']; ?>"> Voir les commentaires </a>
                        </div>
                    <?php
                }
                
                $req->closeCursor();

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
                <textarea name="contenu_billet" id="contenu"></textarea>
                <br/>

                <input type="submit" name="valider" id="valider" value="Envoyer">
            </p>
        </form>

      
    </body>
</html>