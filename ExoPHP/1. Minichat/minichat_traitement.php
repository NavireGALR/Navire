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


if(isset($_POST['pseudo']) AND strlen($_POST['pseudo']) >= 1)
{
	$_SESSION['pseudo'] = strip_tags($_POST['pseudo']);
	$pseudo_ok = true;

}
else
{
	$pseudo_ok = false;
}

if(isset($_POST['message']) AND strlen($_POST['pseudo']) >= 1)
{
	$_SESSION['message'] = strip_tags($_POST['message']);
	$mess_ok = true;
}
else
{
	$mess_ok = false;
}

if($pseudo_ok AND $mess_ok)
{
	$insert = $bdd->prepare('INSERT INTO minichat (pseudo, message) 
			VALUES(:pseudo, :message)');
	$insert->execute(array(
					'pseudo'=> $_SESSION['pseudo'],
					'message'=> $_SESSION['message'],
				));

	$insert->closeCursor();
}
else
{
	$_SESSION['erreur'] = 'Erreur, mettez votre pseudo !';
}
if (isset($_POST['erase'])) {

	$delete = $bdd->query('DELETE FROM minichat');
	$delete->closeCursor();
}


header('Location: minichat.php');

?>