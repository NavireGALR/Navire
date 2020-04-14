<?php

session_start();

if(isset($_POST['deco']))
{
	// Suppression des variables de session et de la session
	$_SESSION = array();
	session_destroy();
	setcookie('login', '');
	setcookie('pass', '');

	echo 'Déconnecté !';
	
}
?>
<a href="index.php"> Retour à l'acceuil </a>