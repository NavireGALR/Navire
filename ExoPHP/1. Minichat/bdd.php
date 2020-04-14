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

$nom= 'tamer';
$console= 'switch';
$possesseur= 'bastien';
$commentaires= 'L EST BONNE';
$prix=20;
$nbjoueurs=2;



$update = $bdd->prepare('UPDATE jeux_video SET possesseur= :possesseur WHERE possesseur=\'patrick\'');
$update->execute(array('possesseur' => $possesseur));

$req = $bdd->prepare('SELECT * FROM jeux_video WHERE possesseur= :possesseur AND nbre_joueurs_max= :nbjoueurs ORDER BY prix ');
$req->execute(array('possesseur'=>$possesseur, 'nbjoueurs'=>$nbjoueurs));



while ($donnees = $req->fetch())
{

	if($donnees['nom'] == $nom)
	{
		$delete = $bdd->prepare('DELETE FROM jeux_video WHERE nom= :nom');
		$delete->execute(array('nom' => $nom));
		
	}


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

$insert = $bdd->prepare('INSERT INTO jeux_video (nom, console, possesseur, prix, nbre_joueurs_max, commentaires) 
			VALUES(:nom, :console, :possesseur, :prix, :nbre_joueurs_max, :commentaires)');
$insert->execute(array(
						'nom'=> $nom,
						'possesseur'=> $possesseur,
						'console'=> $console,
						'prix'=> $prix,
						'nbre_joueurs_max'=> $nbjoueurs,
						'commentaires'=> $commentaires
					));


	$req->closeCursor();
	$insert->closeCursor();
	$update->closeCursor();
	$delete->closeCursor();

?>

