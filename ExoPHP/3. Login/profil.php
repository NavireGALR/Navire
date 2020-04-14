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

$login = $_SESSION['login'];

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Profil <?php echo $login; ?> </title>
    </head>
    <body>
        <h1>MON PROFIL</h1>
            <div class="profil">

            	Bonjour <?php echo $login; ?> <br/>

        		<?php // AFFICHE LE MAIL DEPUIS LA BDD 
            	$req = $bdd->prepare('SELECT mail FROM members WHERE pseudo= :pseudo');
                $req->execute(array('pseudo'=> $login));
                $resultat = $req->fetch();
                echo 'Ton adresse mail enregistré : '. $resultat['mail']; ?><br/>
 
 				<?php //id_groupe jointure table groupe ?>
            	Tu appartiens au groupe : X 
  	        </div>	
            <a href="index.php">Retour à l'acceuil</a>
  	        <form method="post" action="deco.php">
  	        	<p>
  	        		<br/>
  	        		<input type="submit" name="deco" value="Déconnexion">
  	        		<br/>
  	        	</p>
  	        </form>
        
    </body>
</html>
