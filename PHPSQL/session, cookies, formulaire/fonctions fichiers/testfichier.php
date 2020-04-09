<?php

	$fichier_donnees = fopen('donnees.txt', 'r+');

	
	fputs($fichier_donnees, $_COOKIE['login']);
	fseek($fichier_donnees, 0);
	$login_fichier = fgets($fichier_donnees);

	echo $login_fichier;


	fclose($fichier_donnees);
?>

<a href="../login.php"> RETOUR </a>