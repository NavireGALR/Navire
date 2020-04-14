<?php
session_start();

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=bastien;port=3308;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="minichat.css">
        <title>MINICHAT</title>
    </head>
    <body>
        <h1>MINICHAT !</h1>
        
        <section>
        
            <div id="minichat">
            <?php

                $req = $bdd->query('SELECT * FROM minichat ORDER BY id DESC LIMIT 0,10');

                if(isset($_SESSION['erreur']))
                    {
                        echo $_SESSION['erreur'];
                        session_destroy();
                    }
                    
                while ($donnees = $req->fetch())
                {
                    ?>
                    <p><strong><?php echo $donnees['pseudo']; ?> : </strong><?php echo $donnees['message']; ?></p>
                    <?php
                }

                

                $req->closeCursor();

            ?>
            </div>

            <form action="minichat_traitement.php" method="post">
                <p>
                    <label for="pseudo"> PSEUDO:</label>
                    <input type="text" name="pseudo" id="pseudo" value="<?php if(isset($_SESSION['pseudo']))
                                                                            {
                                                                                echo $_SESSION['pseudo'];}
                                                                                                        ?>">
                    <br/>

                    <label for="message"> Votre message :</label>
                    <input type="text" name="message" id="message" autofocus><br/>

                    <input type="submit" name="submit"><br/>
                    <input type="submit" name="erase" value="EFFACER BDD">
                    <br/>
                </p>
            </form>
        </section>
    </body>
</html>

