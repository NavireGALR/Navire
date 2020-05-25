<?php

session_start();
session_destroy();

if(isset($_POST['forget']))
{
	unset($_COOKIE['login']);
	unset($_COOKIE['password']);

	$fichier_donnees = fopen('donnees.txt', 'w+');
	$login_fichier = fgets($fichier_donnees);
	fclose($fichier_donnees);

	echo $login_fichier;
	
}
else
{
	echo 'erreur';
}

include('login.php');

?>