<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=bastien;port=3308;charset=utf8', 'root', '');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


$reponse = $bdd->query('SELECT * FROM jeux_video');


while ($donnees = $reponse->fetch())
{
?>
	<p>
		<strong>JEU :</strong> <?php echo $donnees['nom']; ?><br/>
		<strong>CONSOLE :</strong> <?php echo $donnees['console']; ?><br/>
		<strong>NB_JOUEURS :</strong> <?php echo $donnees['nbre_joueurs_max']; ?><br/>
		Posseseur : <?php echo $donnees['possesseur']; ?> le vend pour <?php echo $donnees['prix']; ?> euros<br/>
		<em>Commentaires: <?php echo $donnees['commentaires']; ?></em><br/>
	</p>

<?php

}
	$reponse->closeCursor();

?>